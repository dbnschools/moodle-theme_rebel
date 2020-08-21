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

    // Replicate the preset setting from boost.
    $name = 'theme_rebel/preset';
    $title = get_string('preset', 'theme_rebel');
    $description = get_string('preset_desc', 'theme_rebel');
    $default = 'rebel.scss';

    // We list files in our own file area to add to the drop down. We will provide our own function to
    // load all the presets from the correct paths.
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_rebel', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets from Boost.
    $choices['rebel.scss'] = 'Rebel';
    $choices['paper.scss'] = 'Shuffled Papers';
    $choices['elearn.scss'] = 'eLearn';
    $choices['grunge.scss'] = 'Grunge';
    $choices['university.scss'] = 'University';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_rebel/presetfiles';
    $title = get_string('presetfiles','theme_rebel');
    $description = get_string('presetfiles_desc', 'theme_rebel');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

/*  // Toggle Page Layout design
    $name = 'theme_rebel/pagelayout';
    $title = get_string('pagelayout' , 'theme_rebel');
    $description = get_string('pagelayout_desc', 'theme_rebel');

    $pagelayout1 = get_string('rebellayout', 'theme_rebel');
    $pagelayout2 = get_string('paperlayout', 'theme_rebel');
    $pagelayout3 = get_string('elearnlayout', 'theme_rebel');
    $pagelayout4 = get_string('grungelayout', 'theme_rebel');

    $default = '1';
    $choices = array('1'=>$pagelayout1, '2'=>$pagelayout2, '3'=>$pagelayout3, '4'=>$pagelayout4);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
*/
    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_rebel/brandcolor';
    $title = get_string('brandcolor', 'theme_rebel');
    $description = get_string('brandcolor_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Default background setting.
    // We use variables for readability.
    $name = 'theme_rebel/defaultbackgroundimage';
    $title = get_string('defaultbackgroundimage', 'theme_rebel');
    $description = get_string('defaultbackgroundimage_desc', 'theme_rebel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'defaultbackgroundimage');
    // This function will copy the image into the data_root location it can be served from.
    $setting->set_updatedcallback('theme_rebel_update_settings_images');
    // We always have to add the setting to a page for it to have any effect.
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


    // Must add the page after defining all the settings!
    $settings->add($page);
