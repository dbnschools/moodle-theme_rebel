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
    $page = new admin_settingpage('theme_rebel_advanced', get_string('advancedsettings', 'theme_rebel'));

    $name = 'theme_rebel/brandcolor';
    $title = get_string('brandcolor', 'theme_rebel');
    $description = get_string('brandcolor_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/navbarbg';
    $title = get_string('navbar-bg', 'theme_rebel');
    $description = get_string('color_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/headerbg';
    $title = get_string('header-bg', 'theme_rebel');
    $description = get_string('color_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/headerlinksbg';
    $title = get_string('headerlinks-bg', 'theme_rebel');
    $description = get_string('color_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/sidebarbg';
    $title = get_string('sidebar-bg', 'theme_rebel');
    $description = get_string('color_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_rebel/footerbg';
    $title = get_string('footer-bg', 'theme_rebel');
    $description = get_string('color_desc', 'theme_rebel');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_rebel/scsspre',
        get_string('rawscsspre', 'theme_rebel'), get_string('rawscsspre_desc', 'theme_rebel'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_configtextarea('theme_rebel/scss', get_string('rawscss', 'theme_rebel'),
        get_string('rawscss_desc', 'theme_rebel'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
    