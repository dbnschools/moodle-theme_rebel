<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace theme_rebel\output;

use html_writer;
use custom_menu;
use action_menu_filler;
use action_menu_link_secondary;
use stdClass;
use moodle_url;
use action_menu;
use theme_config;
use core_text;
use help_icon;
use context_system;
use core_course_list_element;
use context_course;

defined('MOODLE_INTERNAL') || die;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_boost
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    public function full_header() {
        global $PAGE, $COURSE, $USER, $course, $DB;
        $theme = theme_config::load('rebel');
        $course = $this->page->course;
        $context = context_course::instance($course->id);
        
        if ($this->page->include_region_main_settings_in_header_actions() &&
                !$this->page->blocks->is_block_present('settings')) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = html_writer::link(new moodle_url('/course/view.php', array(
            'id' => $PAGE->course->id
        )) , $this->context_header());
        //$header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        //$header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();
        $header->activitynav = $this->activity_navigation();

         // Permissions.
        $hasgradebookshow = $PAGE->course->showgrades == 1;
        $hasactivitycompletionshow = $PAGE->course->enablecompletion == 1;
        $hascompetencyshow = get_config('core_competency', 'enabled');
        $isteacher = has_capability('moodle/course:viewhiddenactivities', $context);
        $isstudent = !has_capability('moodle/course:viewhiddenactivities', $context);
        $hascontentbankpermission = has_capability('contenttype/h5p:access', $context);

        if (is_role_switched($course->id)) { // Has switched roles
                $rolename = '';
                $realuser = \core\session\manager::get_realuser();
                $fullname = fullname($realuser, true);
                if ($role = $DB->get_record('role', array('id'=>$USER->access['rsw'][$context->path]))) {
                    $rolename = ': '.role_get_name($role, $context);
                }

                $loggedinas = get_string('loggedinas', 'moodle', $fullname).$rolename;
        }

        if (\core\session\manager::is_loggedinas()) {
            $header->loginas = $this->login_info();
        }
        if (is_role_switched($course->id) && !\core\session\manager::is_loggedinas()) {
            $header->roleswitch = $loggedinas;
        }
        

        $calendarurl = '';
        if (isset($COURSE->id) && $COURSE->id > 1 && isloggedin() && !isguestuser()) {
            $calendarurl = new moodle_url('/calendar/view.php?view=month', array('course' => $PAGE->course->id ));
        } else {
            $calendarurl = new moodle_url('/calendar/view.php?view=month');
        }

        $gradeurl = '';
        $gradestatus = '';
        // Show on homepage.
        if ($COURSE->id <= 1 && isloggedin() && !isguestuser() && has_capability('gradereport/overview:view', $context)) {
            $gradeurl = new moodle_url('/grade/report/overview/index.php');
            $gradestatus = true;
        }
        // Show for student in course.
        if ($COURSE->id > 1 && isloggedin() && !isguestuser() && has_capability('gradereport/user:view', $context) && $hasgradebookshow) {
            $gradeurl = new moodle_url('/grade/report/user/index.php', array('id' => $PAGE->course->id));
            $gradestatus = true;
        }
        // Show for teacher in course.
        if ($COURSE->id > 1 && has_capability('gradereport/grader:view', $context) && isloggedin() && !isguestuser()) {
            $gradeurl = new moodle_url('/grade/report/grader/index.php', array('id' => $PAGE->course->id));
            $gradestatus = true;
        }

        $switchroletitle = get_string('switchroleto', 'moodle');
        $switchrolelink = new moodle_url('/course/switchrole.php', array('id' => $PAGE->course->id, 'switchrole' => '-1', 'returnurl' => '%2Fcourse%2Fview.php%3F', 'id' => $PAGE->course->id));
        if (is_role_switched($course->id)) {
        $switchroletitle = get_string('switchrolereturn', 'moodle');
        $switchrolelink = new moodle_url('/course/switchrole.php', array('id'=>$course->id,'sesskey'=>sesskey(), 'switchrole'=>0, 'returnurl'=>$this->page->url->out_as_local_url(false)));
        }

        // Easy Enrollment Integration.
        $globalhaseasyenrollment = enrol_get_plugin('easy');
        $coursehaseasyenrollment = '';
        $easycodelink = '';
        $easycodetitle = '';
        if ($globalhaseasyenrollment) {
            $coursehaseasyenrollment = $DB->record_exists('enrol', array('courseid' => $COURSE->id, 'enrol' => 'easy'));
            $easyenrollinstance = $DB->get_record('enrol', array('courseid' => $COURSE->id,'enrol' => 'easy'));
        }
        if ($coursehaseasyenrollment && isset($COURSE->id) && $COURSE->id > 1) {
            $easycodetitle = get_string('header_coursecodes', 'enrol_easy');
            $easycodelink = new moodle_url('/enrol/editinstance.php', array('courseid' => $PAGE->course->id,'id' => $easyenrollinstance->id,'type' => 'easy'));
        }

        // Header links on dashboard.
        if ($COURSE->id <= 1  && isloggedin() && !isguestuser() && $PAGE->pagelayout !== 'coursecategory') {
            $header->headerlinks = [
                'headerlinksdata' => array(
                    array(
                        'status' => !isguestuser() ,
                        'icon' => 'fa-user',
                        'title' => get_string('profile', 'moodle'),
                        'url' => new moodle_url('/user/profile.php', array('id' => $USER->id)),
                        ),
                    array(
                        'status' => $gradestatus && isset($theme->settings->headergrades),
                        'icon' => 'fa-table',
                        'title' => get_string('grades', 'moodle'),
                        'url' => $gradeurl,
                        ),
                    array(
                        'status' => !isguestuser()  && isset($theme->settings->headercalendar),
                        'icon' => 'fa-calendar',
                        'title' => get_string('calendar', 'calendar'),
                        'url' => $calendarurl,
                        ),
                    array(
                        'status' => !isguestuser(),
                        'icon' => 'fa-wrench',
                        'title' => get_string('preferences', 'moodle'),
                        'url' => new moodle_url('/user/preferences.php'),
                        ),
                    array(
                        'status' => !isguestuser(),
                        'icon' => 'fa-user-secret',
                        'title' => $switchroletitle,
                        'url' => $switchrolelink,
                        ),

                ),
            ];
        }

        // Header links on course page.
        if ($COURSE->id > 1 && isloggedin() && !isguestuser()) {
            $header->headerlinks = [
                'headerlinksdata' => array(
                    array(
                        'status' => $gradestatus && isset($theme->settings->headergrades),
                        'icon' => 'fa-table',
                        'title' => get_string('grades', 'moodle'),
                        'url' => $gradeurl,
                        ),
                    array(
                        'status' => !isguestuser() && has_capability('moodle/course:viewparticipants', $context)  && isset($theme->settings->headerparticipants),
                        'icon' => 'fa-users',
                        'title' => get_string('participants', 'moodle'),
                        'url' => new moodle_url('/user/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => has_capability('moodle/badges:earnbadge', $context)  && isset($theme->settings->headerbadges),
                        'icon' => 'fa-id-badge',
                        'title' => get_string('badges', 'badges'),
                        'url' => new moodle_url('/badges/view.php?type=2', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => !isguestuser()  && isset($theme->settings->headercalendar),
                        'icon' => 'fa-calendar',
                        'title' => get_string('calendar', 'calendar'),
                        'url' => $calendarurl,
                        ),
                    array(
                        'status' => !isguestuser() && $hascompetencyshow,
                        'icon' => 'fa-sign-out',
                        'title' => get_string('competencies', 'competency'),
                        'url' => new moodle_url('/admin/tool/lp/coursecompetencies.php', array('courseid' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => $coursehaseasyenrollment && $isteacher,
                        'icon' => 'fa-key',
                        'title' => $easycodetitle,
                        'url' => $easycodelink,
                        ),
                    array(
                        'status' => $hascontentbankpermission  && isset($theme->settings->headercontentbank),
                        'icon' => 'fa-cloud-upload',
                        'title' => get_string('contentbank', 'moodle'),
                        'url' => new moodle_url('/contentbank/index.php', array('contextid' => $context->id)),
                        ),
                    array(
                        'status' => !isguestuser() && $isteacher || is_role_switched($course->id),
                        'icon' => 'fa-user-secret',
                        'title' => $switchroletitle,
                        'url' => $switchrolelink,
                        ),
                ),
            ];
        }

        return $this->render_from_template('theme_rebel/core/full_header', $header);
    }

    public function edit_button_rebel() {
        global $SITE, $PAGE, $USER, $CFG, $COURSE;
        if (!$PAGE->user_allowed_editing() || $COURSE->id <= 1) {
            return '';
        }
        if ($PAGE->pagelayout == 'course' || $PAGE->pagelayout == 'admin') {
            $url = new moodle_url($PAGE->url);
            $url->param('sesskey', sesskey());
            if ($PAGE->user_is_editing()) {
                $url->param('edit', 'off');
                $btn = 'btn-danger sideicon ';
                $title = get_string('editoff', 'theme_rebel');
                $icon = 'fa-power-off';
            }
            else {
                $url->param('edit', 'on');
                $btn = ' attention';
                $title = get_string('editon', 'theme_rebel');
                $icon = 'fa-edit';
            }
            return html_writer::tag('a', html_writer::start_tag('i', array(
                'class' => $icon . ' fa fa-fw'
            )) . html_writer::end_tag('i') , array(
                'href' => $url,
                'class' => 'edit-btn sideicon ' . $btn,
                'data-tooltip' => "tooltip",
                'data-placement' => "right",
                'title' => $title,
            ));
            return $output;
        }
    }

    public function edit_button(moodle_url $url) {
        return '';
    }

    public function iconsidebarcourselinks () {
        global $PAGE, $COURSE, $DB, $CFG, $USER, $OUTPUT;

        $theme = theme_config::load('rebel');
        $course = $this->page->course;
        $context = context_course::instance($course->id);

        // Teacher or student.
        $teachermenu = has_capability('moodle/course:viewhiddenactivities', $context) && $COURSE->id > 1;
        $userswitchedrole = is_role_switched($course->id) || has_capability('moodle/course:viewhiddenactivities', $context);
        
        // Permissions.
        $hasgradebookshow = $PAGE->course->showgrades == 1;
        $hasactivitycompletionshow = $PAGE->course->enablecompletion == 1;
        $hascompetencyshow = get_config('core_competency', 'enabled');
        $hascontentbankpermission = has_capability('contenttype/h5p:access', $context);

        // Send to template.
        $coursemanagementlinks = [
            'teachermenu' => $teachermenu, 
            'courseadminmenutitle' => get_string('courseadminmenutitle', 'theme_rebel'),
            'coursereportmenutitle' => get_string('coursereportmenutitle', 'theme_rebel'),

            'teacherlinks' => array(
                    array(
                        'status' => isset($theme->settings->contentbank) && $hascontentbankpermission,
                        'title' => get_string('contentbank', 'moodle'),
                        'url' => new moodle_url('/contentbank/index.php', array('contextid' => $context->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->gradebook),
                        'title' => get_string('gradebook', 'grades'),
                        'url' => new moodle_url('/grade/report/grader/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->participants),
                        'title' => get_string('participants', 'moodle'),
                        'url' => new moodle_url('/user/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->groups),
                        'title' =>  get_string('groups', 'group'),
                        'url' => new moodle_url('/group/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->badges),
                        'title' => get_string('managebadges', 'badges'),
                        'url' => new moodle_url('/badges/index.php?type=2', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->coursecompletion) && $hasactivitycompletionshow,
                        'title' => get_string('editcoursecompletionsettings', 'completion'),
                        'url' => new moodle_url('/course/completion.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->coursecopy),
                        'title' => get_string('copycourse', 'moodle'),
                        'url' => new moodle_url('/backup/copy.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->coursereset),
                        'title' => get_string('reset', 'moodle'),
                        'url' => new moodle_url('/course/reset.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->coursebackup),
                        'title' => get_string('backup', 'moodle'),
                        'url' => new moodle_url('/backup/backup.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->courserestore),
                        'title' => get_string('restore', 'moodle'),
                        'url' => new moodle_url('/backup/restorefile.php', array('contextid' => $PAGE->context->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->courseimport),
                        'title' => get_string('import', 'moodle'),
                        'url' => new moodle_url('/backup/import.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->recyclebin),
                        'title' => get_string('pluginname', 'tool_recyclebin'),
                        'url' => new moodle_url('/admin/tool/recyclebin/index.php', array('contextid' => $PAGE->context->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->courseedit),
                        'title' => get_string('editcoursesettings', 'moodle'),
                        'url' => new moodle_url('/course/edit.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->courseadmin),
                        'title' => get_string('moreoptions', 'theme_rebel'),
                        'url' => new moodle_url('/course/admin.php', array('courseid' => $PAGE->course->id)),
                        ),
            ),


            'teacherreports' => array(
                    array(
                        'status' => isset($theme->settings->activitycompletion) && $hasactivitycompletionshow,
                        'title' => get_string('activitycompletion', 'completion'),
                        'url' => new moodle_url('/report/progress/index.php', array('course' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->logs),
                        'title' => get_string('logs', 'moodle'),
                        'url' => new moodle_url('/report/log/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->livelogs),
                        'title' => get_string('pluginname', 'report_loglive'),
                        'url' => new moodle_url('/report/livelog/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->courseparticipation),
                        'title' => get_string('pluginname', 'report_participation'),
                        'url' => new moodle_url('/report/participation/index.php', array('id' => $PAGE->course->id)),
                        ),
                    array(
                        'status' => isset($theme->settings->competencybreakdown) && $hascompetencyshow,
                        'title' => get_string('pluginname', 'report_competency'),
                        'url' => new moodle_url('/report/competency/index.php', array('id' => $PAGE->course->id)),
                        ),
            ),

        ];

    return $this->render_from_template('theme_rebel/coursemanagementlinks', $coursemanagementlinks);

    }

    public function enrolform () {
        global $PAGE;
        $enrolform = '';
        $plugin = enrol_get_plugin('easy');
        $title = get_string('enrolform_heading', 'enrol_easy');
        $blurp = get_string('easyenrol_blurp', 'theme_rebel');

        if ($plugin && !isguestuser() && $PAGE->pagelayout == 'mydashboard') {
            $enrolform = '<section id="easyenrol" class=" block_easyenrol block  card mb-3" role="complementary" aria-labelledby="easyenrol">
    <div class="card-body p-3">
        <h5 class="card-title d-inline">' . $title . '</h5>
            <div class="card-text content mt-3"> <p>' . $blurp . '</p>';
            $enrolform .= $plugin->get_form();
            $enrolform .= '</div>
    </div>
</section>';
        }
        return $enrolform;
    }



    Public function iconsidebarmenu () {
        global $PAGE, $COURSE, $CFG, $USER, $OUTPUT;

        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $theme = theme_config::load('rebel');

        // Restrict Access.
        $hasadminlink = has_capability('moodle/site:configview', $context);
        $showincourseonly = isset($COURSE->id) && $COURSE->id > 1 && isloggedin() && !isguestuser();
        $showondashboardonly = $PAGE->pagelayout == 'mydashboard';
        $showloggedinonly = isloggedin();
        $userisediting = $PAGE->user_is_editing() && $PAGE->user_can_edit_blocks();
        $isteacherdash = has_capability('moodle/course:viewhiddenactivities', $context);
        

        // Icon Links.
        $coursehome = $PAGE->course->fullname;
        $coursehomeurl = new moodle_url('/course/view.php', array('id' => $PAGE->course->id ));

        $mycourses = get_string('mycourses', 'moodle');
        $mycoursesurl = new moodle_url('/my/');

        $editpage = $this->edit_button_rebel();

        $addblock = get_string('addblock', 'moodle');
        $addblockurl = new moodle_url($PAGE->url, ['bui_addblock' => '', 'sesskey' => sesskey()]);
        
        $courseadmin = get_string('courseadministration', 'moodle');
        $courseadminlinks = $this->iconsidebarcourselinks();

        $hascreatecourse = (isloggedin() && has_capability('moodle/course:create', $context));
        $createcourseurl = new moodle_url('/course/edit.php');
        $createcourse = get_string('createnewcourse', 'moodle');;

        $viewcourses = get_string('findmorecourses', 'moodle');
        $viewcoursesurl = new moodle_url('/course/');

        $siteadmintitle = get_string('administrationsite', 'moodle');
        $siteadminurl = new moodle_url('/admin/search.php');

        $logouttitle = get_string('logout', 'moodle');
        $logouturl = new moodle_url('/login/logout.php', array('sesskey'=>sesskey()));

        $shownavdrawer = isset($theme->settings->shownavdrawer);
        $showcourseadminlink = isset($theme->settings->shownavdrawer) && $theme->settings->shownavdrawer == 0;
        $directcourseadminlink = new moodle_url('/course/admin.php', array('courseid' => $PAGE->course->id));


        // Send to template
        $iconsidebar = [
            'showcoursemanagebutton' => $isteacherdash && isset($theme->settings->shownavdrawer) && $theme->settings->shownavdrawer == 1,
            'showincourseonly' => $showincourseonly, 
            'courseadmin' => $courseadmin, 
            'courseadminlinks' => $courseadminlinks, 
            'hasadminlink' => $hasadminlink, 
            'siteadmintitle' => $siteadmintitle, 
            'siteadminurl' => $siteadminurl,
            'mycourses' => $mycourses, 
            'mycoursesurl' => $mycoursesurl, 
            'editpage' => $editpage, 
            'addblock' => $addblock, 
            'addblockurl' => $addblockurl, 
            'userisediting' => $userisediting, 
            'viewcoursesurl' => $viewcoursesurl , 
            'viewcourses' => $viewcourses, 
            'coursehomeurl' => $coursehomeurl, 
            'coursehome' => $coursehome, 
            'createcourse' => $createcourse, 
            'createcourseurl' => $createcourseurl, 
            'hascreatecourse' => $hascreatecourse, 
            'showondashboardonly' => $showondashboardonly, 
            'showloggedinonly' => $showloggedinonly,
            'logouttitle' => $logouttitle,
            'logouturl' => $logouturl,
            'showcourseadminlink' => $showcourseadminlink,
            'directcourseadminlink' => $directcourseadminlink,
        ];

        return $this->render_from_template('theme_rebel/iconsidebar', $iconsidebar);
    }

    /**
     * Return the standard string that says whether you are logged in (and switched
     * roles/logged in as another user).
     * @param bool $withlinks if false, then don't include any links in the HTML produced.
     * If not set, the default is the nologinlinks option from the theme config.php file,
     * and if that is not set, then links are included.
     * @return string HTML fragment.
     */
    public function login_info($withlinks = null) {
        global $USER, $CFG, $DB, $SESSION;

        if (during_initial_install()) {
            return '';
        }

        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        $course = $this->page->course;
        if (\core\session\manager::is_loggedinas()) {
            $realuser = \core\session\manager::get_realuser();
            $fullname = fullname($realuser, true);
            if ($withlinks) {
                $loginastitle = get_string('loginas');
                $realuserinfo = " [<a href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\"";
                $realuserinfo .= "title =\"".$loginastitle."\">$fullname</a>] ";
            } else {
                $realuserinfo = " [$fullname] ";
            }
        } else {
            $realuserinfo = '';
        }

        $loginpage = $this->is_login_page();
        $loginurl = get_login_url();

        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            $fullname = fullname($USER, true);
            // Since Moodle 2.0 this link always goes to the public profile page (not the course profile page)
            if ($withlinks) {
                $linktitle = get_string('viewprofile');
                $username = "<a href=\"$CFG->wwwroot/user/profile.php?id=$USER->id\" title=\"$linktitle\">$fullname</a>";
            } else {
                $username = $fullname;
            }
            if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id'=>$USER->mnethostid))) {
                if ($withlinks) {
                    $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                } else {
                    $username .= " from {$idprovider->name}";
                }
            }
            if (isguestuser()) {
                $loggedinas = $realuserinfo.get_string('loggedinasguest');
                if (!$loginpage && $withlinks) {
                    $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
                }
            } else if (is_role_switched($course->id)) { // Has switched roles
                $rolename = '';
                if ($role = $DB->get_record('role', array('id'=>$USER->access['rsw'][$context->path]))) {
                    $rolename = ': '.role_get_name($role, $context);
                }
                $loggedinas = get_string('loggedinas', 'moodle', $username).$rolename;
                if ($withlinks) {
                    $url = new moodle_url('/course/switchrole.php', array('id'=>$course->id,'sesskey'=>sesskey(), 'switchrole'=>0, 'returnurl'=>$this->page->url->out_as_local_url(false)));
                    $loggedinas .= ' ('.html_writer::tag('a', get_string('switchrolereturn'), array('href' => $url)).')';
                }
            } else {
                $loggedinas = $realuserinfo.get_string('loggedinas', 'moodle', $username);
                if ($withlinks) {
                    $loggedinas .= " (<a href=\"$CFG->wwwroot/login/logout.php?sesskey=".sesskey()."\">".get_string('logout').'</a>)';
                }
            }
        } else {
            $loggedinas = get_string('loggedinnot', 'moodle');
            if (!$loginpage && $withlinks) {
                $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
            }
        }

        $loggedinas = '<div class="logininfo">'.$loggedinas.'</div>';

        if (isset($SESSION->justloggedin)) {
            unset($SESSION->justloggedin);
            if (!empty($CFG->displayloginfailures)) {
                if (!isguestuser()) {
                    // Include this file only when required.
                    require_once($CFG->dirroot . '/user/lib.php');
                    if ($count = user_count_login_failures($USER)) {
                        $loggedinas .= '<div class="loginfailures">';
                        $a = new stdClass();
                        $a->attempts = $count;
                        $loggedinas .= get_string('failedloginattempts', '', $a);
                        if (file_exists("$CFG->dirroot/report/log/index.php") and has_capability('report/log:view', context_system::instance())) {
                            $loggedinas .= ' ('.html_writer::link(new moodle_url('/report/log/index.php', array('chooselog' => 1,
                                    'id' => 0 , 'modid' => 'site_errors')), get_string('logs')).')';
                        }
                        $loggedinas .= '</div>';
                    }
                }
            }
        }

        return $loggedinas;
    }


}
