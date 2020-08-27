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
    $page = new admin_settingpage('theme_rebel_login', get_string('loginsettings', 'theme_rebel'));

    // This is the descriptor for the page.
    $name = 'theme_rebel/customlogininfo';
    $heading = get_string('customlogininfo', 'theme_rebel');
    $information = get_string('customlogininfo_desc', 'theme_rebel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Show custom login form.
    $name = 'theme_rebel/showcustomlogin';
    $title = get_string('showcustomlogin', 'theme_rebel');
    $description = get_string('showcustomlogin_desc', 'theme_rebel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top image.
    $name = 'theme_rebel/logintopimage';
    $title = get_string('logintopimage', 'theme_rebel');
    $description = get_string('logintopimage_desc', 'theme_rebel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logintopimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Full width top textbox.
    $name = 'theme_rebel/logintoptext';
    $title = get_string('logintoptext', 'theme_rebel');
    $description = get_string('logintoptext_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Feature text.
    $name = 'theme_rebel/feature1text';
    $title = get_string('featuretext', 'theme_rebel');
    $description = get_string('featuretext_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Feature text.
    $name = 'theme_rebel/feature2text';
    $title = get_string('featuretext', 'theme_rebel');
    $description = get_string('featuretext_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Feature text.
    $name = 'theme_rebel/feature3text';
    $title = get_string('featuretext', 'theme_rebel');
    $description = get_string('featuretext_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Full width textbox.
    $name = 'theme_rebel/loginbottomtext';
    $title = get_string('loginbottomtext', 'theme_rebel');
    $description = get_string('loginbottomtext_desc', 'theme_rebel');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $settings->add($page);
    