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


    // Each page is a tab - the first is the "General" tab.
    $page = new admin_settingpage('theme_rebel_general', get_string('generalsettings', 'theme_rebel'));

    // Preset files setting.
    $name = 'theme_rebel/presetfiles';
    $title = get_string('presetfiles','theme_rebel');
    $description = get_string('presetfiles_desc', 'theme_rebel');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Default background settings.
    // Show header images.
    $name = 'theme_rebel/showheaderimages';
    $title = get_string('showheaderimages', 'theme_rebel');
    $description = get_string('showheaderimages_desc', 'theme_rebel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/defaultbackgroundimage';
    $title = get_string('defaultbackgroundimage', 'theme_rebel');
    $description = get_string('defaultbackgroundimage_desc', 'theme_rebel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'defaultbackgroundimage');
    // This function will copy the image into the data_root location it can be served from.
    $setting->set_updatedcallback('theme_rebel_update_settings_images');
    // We always have to add the setting to a page for it to have any effect.
    $page->add($setting);

    // overlay header overlay.
    $name = 'theme_rebel/headeroverlay';
    $title = get_string('headeroverlay', 'theme_rebel');
    $description = get_string('headeroverlay_desc', 'theme_rebel');
    global $CFG;
    $cp = $CFG->wwwroot.'/theme/rebel/pix/overlay/';
    $overlaychoices[] = '';
    // Add overlay files from theme overlay folder.
    $iterator = new DirectoryIterator($CFG->dirroot . '/theme/rebel/pix/overlay/');
    foreach ($iterator as $overlayfile) {
        if (!$overlayfile->isDot()) {
            $overlayname = substr($overlayfile, 0); // Name - '.scss'.
            $overlaychoices[$cp . $overlayname] = ucfirst($overlayname);
        }
    }
    // Sort choices.
    natsort($overlaychoices);
    $default = '';
    $setting = new admin_setting_configselect($name, $title, $description, $default, $overlaychoices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // overlay header overlay.
    $name = 'theme_rebel/footeroverlay';
    $title = get_string('footeroverlay', 'theme_rebel');
    $description = get_string('footeroverlay_desc', 'theme_rebel');
    global $CFG;
    $cp = $CFG->wwwroot.'/theme/rebel/pix/overlay/';
    $overlaychoices[] = '';
    // Add overlay files from theme overlay folder.
    $iterator = new DirectoryIterator($CFG->dirroot . '/theme/rebel/pix/overlay/');
    foreach ($iterator as $overlayfile) {
        if (!$overlayfile->isDot()) {
            $overlayname = substr($overlayfile, 0); // Name - '.scss'.
            $overlaychoices[$cp . $overlayname] = ucfirst($overlayname);
        }
    }
    // Sort choices.
    natsort($overlaychoices);
    $default = '';
    $setting = new admin_setting_configselect($name, $title, $description, $default, $overlaychoices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login page background setting.
    // We use variables for readability.
    $name = 'theme_rebel/loginbkgimage';
    $title = get_string('loginbackgroundimage', 'theme_rebel');
    $description = get_string('loginbackgroundimage_desc', 'theme_rebel');
    // This creates the new setting.
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbkgimage');
    // This function will copy the image into the data_root location it can be served from.
    $setting->set_updatedcallback('theme_rebel_update_settings_images');
    // We always have to add the setting to a page for it to have any effect.
    $page->add($setting);

    // Default background setting.
    // We use variables for readability.
    $name = 'theme_rebel/coursetilebg';
    $title = get_string('coursetilebg', 'theme_rebel');
    $description = get_string('coursetilebg_desc', 'theme_rebel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'coursetilebg');
    // This function will copy the image into the data_root location it can be served from.
    $setting->set_updatedcallback('theme_rebel_update_settings_images');
    // We always have to add the setting to a page for it to have any effect.
    $page->add($setting);

    // Alert setting.
    $name = 'theme_rebel/alertbox';
    $title = get_string('alert', 'theme_rebel');
    $description = get_string('alert_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard Teacher Textbox.
    $name = 'theme_rebel/cmnoteteacher';
    $title = get_string('cmnoteteacher', 'theme_rebel');
    $description = get_string('cmnoteteacher_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard Student Textbox.
    $name = 'theme_rebel/cmnotestudent';
    $title = get_string('cmnotestudent', 'theme_rebel');
    $description = get_string('cmnotestudent_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Must add the page after defining all the settings!
    $settings->add($page);
