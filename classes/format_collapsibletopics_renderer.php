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
 * Overridden collapsibletopics format renderer class
 *
 * @package    theme_rebel
 * @author     Chris Kenniburg
 * @copyright  Dearborn Public Schools
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//namespace theme_rebel\output;

defined('MOODLE_INTERNAL') || die();
global $PAGE;

// So that theme users that do not want collapsibletopics format will not get errors.
if (file_exists($CFG->dirroot . '/course/format/collapsibletopics/renderer.php')) {
    require_once($CFG->dirroot . '/course/format/collapsibletopics/renderer.php');

    /**
     * Overridden collapsibletopics format renderer class definition
     *
     * @package    theme_receptic
     * @author     Jean-Roch Meurisse
     * @copyright  2016 - Cellule TICE - Unversite de Namur
     * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
     */
    class theme_rebel_format_collapsibletopics_renderer extends format_collapsibletopics_renderer {


	/**
     * Overrides format_section_renderer_base implementation.
     *
     * @param stdClass $course The course entry from DB
     * @param array $sections (argument not used)
     * @param array $mods (argument not used)
     * @param array $modnames (argument not used)
     * @param array $modnamesused (argument not used)
     */
    public function print_multiple_section_page($course, $sections, $mods, $modnames, $modnamesused) {
        global $PAGE;

        if (!isset($course->coursedisplay)) {
            $course->coursedisplay = COURSE_DISPLAY_SINGLEPAGE;
        }

        $modinfo = get_fast_modinfo($course);
        $course = course_get_format($course)->get_course();

        $context = context_course::instance($course->id);
        // Title with completion help icon.
        $completioninfo = new completion_info($course);
        
        echo $this->output->heading($this->page_title(), 2, 'accesshide');

        // Copy activity clipboard..
        echo $this->course_activity_clipboard($course, 0);

        // Now the list of sections..
        echo $this->start_section_list();
        $numsections = course_get_format($course)->get_last_section_number();

        foreach ($modinfo->get_section_info_all() as $section => $thissection) {
            if ($section == 0) {
                // 0-section is displayed a little different then the others.
                if ($thissection->summary or !empty($modinfo->sections[0]) or $PAGE->user_is_editing()) {
                    $this->page->requires->strings_for_js(array('collapseall', 'expandall'), 'moodle');
                    $modules = $this->courserenderer->course_section_cm_list($course, $thissection, 0);
                    echo $this->section_header($thissection, $course, false, 0);
                    echo $modules;
                    echo $this->courserenderer->course_section_add_cm_control($course, 0, 0);
                    echo $this->section_footer();
                    echo $completioninfo->display_help_icon();
                    echo '<div class="collapsible-actions editing" >
    <a href="#" class="expandall" role="button">' . get_string('expandall') . '
    </a>
</div>';

                }
                continue;
            }
            if ($section > $numsections) {
                // Activities inside this section are 'orphaned', this section will be printed as 'stealth' below.
                continue;
            }
            // Show the section if the user is permitted to access it, OR if it's not available
            // but there is some available info text which explains the reason & should display.
            $showsection = $thissection->uservisible ||
                ($thissection->visible && !$thissection->available &&
                    !empty($thissection->availableinfo))
                || (!$thissection->visible && !$course->hiddensections);
            if (!$showsection) {
                continue;
            }

            $modules = $this->courserenderer->course_section_cm_list($course, $thissection, 0);
            $control = $this->courserenderer->course_section_add_cm_control($course, $section, 0);
            echo $this->section_header($thissection, $course, false, 0);

            if ($thissection->uservisible) {
                echo $modules;
                echo $control;
            }

            echo $this->section_footer();
        }

        if ($PAGE->user_is_editing() and has_capability('moodle/course:update', $context)) {
            // Print stealth sections if present.
            foreach ($modinfo->get_section_info_all() as $section => $thissection) {
                if ($section <= $numsections or empty($modinfo->sections[$section])) {
                    // This is not stealth section or it is empty.
                    continue;
                }
                echo $this->stealth_section_header($section);
                echo $this->courserenderer->course_section_cm_list($course, $thissection, 0);
                echo $this->stealth_section_footer();
            }

            echo $this->end_section_list();

            echo $this->change_number_sections($course, 0);
        } else {
            echo $this->end_section_list();
        }
    }

    }
}