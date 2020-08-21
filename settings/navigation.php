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

/**
 * @package   theme_rebel
 * @copyright 2020 Chris Kenniburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

    // Advanced settings.
    $page = new admin_settingpage('theme_rebel_courseadmin', get_string('courseadminmenusettings', 'theme_rebel'));

    // Show/hide coursemanagement slider toggle.
    $name = 'theme_rebel/shownavdrawer';
    $title = get_string('shownavdrawer', 'theme_rebel');
    $description = get_string('shownavdrawer_desc', 'theme_rebel');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Content Info
    $name = 'theme_fordson/courseadmininfo';
    $heading = get_string('courseadmininfo', 'theme_rebel');
    $information = get_string('courseadmininfo_desc', 'theme_rebel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/contentbank';
        $title = get_string('contentbank', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/gradebook';
        $title = get_string('gradebook', 'grades');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/participants';
        $title = get_string('participants', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/groups';
        $title = get_string('groups', 'group');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/badges';
        $title = get_string('managebadges', 'badges');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/coursecompletion';
        $title = get_string('editcoursecompletionsettings', 'completion');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/courseedit';
        $title = get_string('editcoursesettings', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/coursecopy';
        $title = get_string('copycourse', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/coursereset';
        $title = get_string('reset', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/coursebackup';
        $title = get_string('backup', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/courserestore';
        $title = get_string('restore', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/courseimport';
        $title = get_string('import', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/recyclebin';
        $title = get_string('pluginname', 'tool_recyclebin');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/courseadmin';
        $title = get_string('courseadministration', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

    // Content Info
    $name = 'theme_fordson/courseadminreportinfo';
    $heading = get_string('courseadminreportinfo', 'theme_rebel');
    $information = get_string('courseadmininfo_desc', 'theme_rebel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

        // Show/hide report.
        $name = 'theme_rebel/competencybreakdown';
        $title = get_string('pluginname', 'report_competency');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide report.
        $name = 'theme_rebel/activitycompletion';
        $title = get_string('activitycompletion', 'completion');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide report.
        $name = 'theme_rebel/logs';
        $title = get_string('logs', 'moodle');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide report.
        $name = 'theme_rebel/livelogs';
        $title = get_string('pluginname', 'report_loglive');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide report.
        $name = 'theme_rebel/courseparticipation';
        $title = get_string('pluginname', 'report_participation');
        $description = get_string('courseadminlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

// Content Info
    $name = 'theme_fordson/headermenuinfo';
    $heading = get_string('headermenuinfo', 'theme_rebel');
    $information = get_string('headermenuinfo_desc', 'theme_rebel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

        // Show/hide student menu item.
        $name = 'theme_rebel/headergrades';
        $title = get_string('gradebook', 'grades');
        $description = get_string('courseheaderlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide student menu item.
        $name = 'theme_rebel/headerparticipants';
        $title = get_string('participants', 'moodle');
        $description = get_string('courseheaderlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide student menu item.
        $name = 'theme_rebel/headerbadges';
        $title = get_string('badges', 'badges');
        $description = get_string('courseheaderlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide student menu item.
        $name = 'theme_rebel/headercalendar';
        $title = get_string('calendar', 'calendar');
        $description = get_string('courseheaderlinktoggle', 'theme_rebel');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Show/hide coursemanagement slider toggle.
        $name = 'theme_rebel/headercontentbank';
        $title = get_string('contentbank', 'moodle');
        $description = get_string('courseheaderlinktoggle', 'theme_rebel');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);




    $settings->add($page);
    