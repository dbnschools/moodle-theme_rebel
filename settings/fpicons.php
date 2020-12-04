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
* Social networking settings page file.
*
* @package    theme_rebel
* @copyright  2020 Chris Kenniburg
* 
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

// Icon Navigation);
$page = new admin_settingpage('theme_rebel_iconnavheading', get_string('iconnavheading', 'theme_rebel'));

// This is the descriptor for the page.
$name = 'theme_rebel/iconnavinfo';
$heading = get_string('iconnavinfo', 'theme_rebel');
$information = get_string('iconnavinfo_desc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// This is the descriptor for icon One
$name = 'theme_rebel/iconwidthinfo';
$heading = get_string('iconwidthinfo', 'theme_rebel');
$information = get_string('iconwidthinfodesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Icon width setting.
$name = 'theme_rebel/iconwidth';
$title = get_string('iconwidth', 'theme_rebel');
$description = get_string('iconwidth_desc', 'theme_rebel');;
$default = '100px';
$choices = array(
    '75px' => '75px',
    '85px' => '85px',
    '95px' => '95px',
    '100px' => '100px',
    '105px' => '105px',
    '110px' => '110px',
    '115px' => '115px',
    '120px' => '120px',
    '125px' => '125px',
    '130px' => '130px',
    '135px' => '135px',
    '140px' => '140px',
    '145px' => '145px',
    '150px' => '150px',
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


// This is the descriptor for teacher create a course
$name = 'theme_rebel/sliderinfo';
$heading = get_string('sliderinfo', 'theme_rebel');
$information = get_string('sliderinfodesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// Creator Icon
$name = 'theme_rebel/slideicon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('naviconslidedesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/slideiconbuttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Slide Textbox.
$name = 'theme_rebel/slidetextbox';
$title = get_string('slidetextbox', 'theme_rebel');
$description = get_string('slidetextbox_desc', 'theme_rebel');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon One
$name = 'theme_rebel/navicon1info';
$heading = get_string('navicon1', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

// icon One
$name = 'theme_rebel/nav1icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav1buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav1buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav1target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon One
$name = 'theme_rebel/navicon2info';
$heading = get_string('navicon2', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav2icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav2buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav2buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav2target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon three
$name = 'theme_rebel/navicon3info';
$heading = get_string('navicon3', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav3icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav3buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav3buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav3target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon four
$name = 'theme_rebel/navicon4info';
$heading = get_string('navicon4', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav4icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav4buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav4buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default =  $CFG->wwwroot.'/course/';
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav4target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon four
$name = 'theme_rebel/navicon5info';
$heading = get_string('navicon5', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav5icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav5buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav5buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav5target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon six
$name = 'theme_rebel/navicon6info';
$heading = get_string('navicon6', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav6icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav6buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav6buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav6target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon seven
$name = 'theme_rebel/navicon7info';
$heading = get_string('navicon7', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav7icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav7buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav7buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav7target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// This is the descriptor for icon eight
$name = 'theme_rebel/navicon8info';
$heading = get_string('navicon8', 'theme_rebel');
$information = get_string('navicondesc', 'theme_rebel');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);

$name = 'theme_rebel/nav8icon';
$title = get_string('navicon', 'theme_rebel');
$description = get_string('navicondesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav8buttontext';
$title = get_string('naviconbuttontext', 'theme_rebel');
$description = get_string('naviconbuttontextdesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav8buttonurl';
$title = get_string('naviconbuttonurl', 'theme_rebel');
$description = get_string('naviconbuttonurldesc', 'theme_rebel');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_rebel/nav8target';
$title = get_string('marketingurltarget' , 'theme_rebel');
$description = get_string('marketingurltargetdesc', 'theme_rebel');
$target1 = get_string('marketingurltargetself', 'theme_rebel');
$target2 = get_string('marketingurltargetnew', 'theme_rebel');
$target3 = get_string('marketingurltargetparent', 'theme_rebel');
$default = 'target1';
$choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
