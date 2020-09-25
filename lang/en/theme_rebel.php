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
 * Language file.
 *
 * @package   theme_rebel
 * @copyright 2020 Chris Kenniburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// The name of the second tab in the theme settings.
$string['advancedsettings'] = 'Advanced Settings';
$string['courseadminmenusettings'] = 'Navigation Menu Settings';
$string['loginsettings'] = 'Login Settings';

$string['courseadmininfo'] = 'Teacher Course Management Links';
$string['courseadminreportinfo'] = 'Teacher Course Management Report Links';
$string['courseadmininfo_desc'] = 'Determine which links you would like to display to teachers in the Course Management navigation drawer.';
$string['headermenuinfo'] = 'Header Menu Items';
$string['headermenuinfo_desc'] = 'Determine which links you would like to display in the header area.';
$string['customlogininfo'] = 'Enhance the Login Page';
$string['customlogininfo_desc'] = 'Use the options below to enhance the login page for Rebel.';

// Misc strings
$string['nomycourses'] = 'You are not enrolled in any courses.';


// Privacy.
$string['privacy:metadata'] = 'The Rebel theme does not store any individual user data.';

// The backgrounds tab name.
$string['backgrounds'] = 'Backgrounds';
// The brand colour setting.
$string['brandcolor'] = 'Brand colour';
// The brand colour setting description.
$string['brandcolor_desc'] = 'The accent colour.';
// A description shown in the admin theme selector.
$string['choosereadme'] = 'Theme rebel is a child theme of Boost. It adds the ability to upload background rebel.';
// Name of the settings pages.
$string['configtitle'] = 'Rebel Theme';
// Background image for dashboard page.
$string['dashboardbackgroundimage'] = 'Dashboard page background image';
// Background image for dashboard page.
$string['dashboardbackgroundimage_desc'] = 'An image that will be stretched to fill the background of the dashboard page.';
// Background image for default page.
$string['defaultbackgroundimage'] = 'Default page background image';
// Background image for default page.
$string['defaultbackgroundimage_desc'] = 'An image that will be stretched to fill the background of all pages without a more specific background image.';
// Background image for front page.
$string['frontpagebackgroundimage'] = 'Front page background image';
// Background image for front page.
$string['frontpagebackgroundimage_desc'] = 'An image that will be stretched to fill the background of the front page.';
// Name of the first settings tab.
$string['generalsettings'] = 'General settings';
// Background image for incourse page.
$string['incoursebackgroundimage'] = 'Course page background image';
// Background image for incourse page.
$string['incoursebackgroundimage_desc'] = 'An image that will be stretched to fill the background of course pages.';
// Background image for login page.
$string['loginbackgroundimage'] = 'Login page background image';
// Background image for login page.
$string['loginbackgroundimage_desc'] = 'An image that will be stretched to fill the background of the login page.';
// The name of our plugin.
$string['pluginname'] = 'Rebel';
// Preset files setting.
$string['presetfiles'] = 'Additional theme preset files';
// Preset files help text.
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href=https://docs.moodle.org/dev/Boost_Presets>Boost presets</a> for information on creating and sharing your own preset files. Rebel requires certain SCSS Preset variables.  You can view the Rebel theme presets here: <a href=https://github.com/dbnschools/moodle-theme_rebel/tree/master/scss/preset target=_blank>Rebel Github Presets repository</a>. ';
// Preset setting.
$string['preset'] = 'Theme preset';
// Preset help text.
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
// Raw SCSS setting.
$string['rawscss'] = 'Raw SCSS';
// Raw SCSS setting help text.
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
// Raw initial SCSS setting.
$string['rawscsspre'] = 'Raw initial SCSS';
// Raw initial SCSS setting help text.
$string['rawscsspre_desc'] = '// Top Navbar area</br>
$navbar-bg: #e3eaf5 !default;</br>
$navbartextcolor: #333 !default;</br>

// Top Header area</br>
$header-bg: #eef5f9 !default;</br>
$headerimageheight: 650px !default;</br>
$headerlinks-bg: #e3eaf5 !default;</br>
$headerlinks-link: $black !default;</br>

// Breadcrumbs in Rebel</br>
$breadcrumbblock: #607d8b;</br>
$breadcrumbblock-darken: #213561;</br>
$breadcrumbblock-highlight: #213561;</br>
$breadcrumbblock-highlight-darken: #607d8b;</br>
$breadcrumblinkcolor: $white;</br>
$breadcrumblinkcolor-hover: $white;</br>

//Sidebar icons menu</br>
$sidebar-bg: $body-bg !default;</br>
$sidebar-iconcolor: $white !default;</br>
$sidebar-ahover-bg: #1f77b2 !default;</br>
$sidebar-aattention: #4caf50 !default;</br>
$sidebar-borderright-color: $white !default;</br>

// Bottom Footer area</br>
$footer-bg: #e5ebef !default;</br>
$footerlinkcolor: #333 !default;</br>
$footertextcolor: #333 !default;</br>

//Used to style Easy Enrollment plugin</br>
$easyenrolltextcolor: $white !default;</br>
$easyenroll-bg: #4caf50 !default;</br>

//Other Important Colors</br>
$card-bg: rgba(255, 255, 255, 0.98)!default;</br>
$body-bg: #213561 !default;</br>
$primary:       #1968BE !default;</br>
$success:       $green !default;</br>
$info:          #4caf50 !default;</br>
$warning:       $orange !default;</br>
$danger:        $red !default;</br>
$secondary:     $gray-400 !default;</br>

// Tabs</br>
$nav-tabs-border-color:             $gray-300 !default;</br>
$nav-tabs-link-hover-border-color:  $gray-200 $gray-200 $nav-tabs-border-color !default;</br>
$nav-tabs-link-active-color:        $gray-700 !default;</br>
$nav-tabs-link-active-bg:           $gray-200 !default;</br>
$nav-tabs-link-active-border-color: $gray-300 $gray-300 $nav-tabs-link-active-bg !default;';

// We need to include a lang string for each block region.
$string['region-side-pre'] = 'Right';

//Edit Button Text
$string['editon'] = 'Turn Edit On';
$string['editoff'] = 'Turn Edit Off';

// Easy Enrollment.
$string['easyenrol_blurp'] = 'Enter your course code below to enroll in new courses.  Your teacher provides a course code. ';

// Settings Pages
$string['courseadminlinktoggle'] = 'Show or hide this link in the Course Management navigation drawer.';
$string['courseheaderlinktoggle'] = 'Show or hide this link in the header area.';

// Courseadmin links
$string['courseadminmenutitle'] = 'Course Management';
$string['coursereportmenutitle'] = 'Course Reports';
$string['moreoptions'] = 'More Options...';

// Custom Login Page
$string['showcustomlogin'] = 'Use Custom Login Page';
$string['showcustomlogin_desc'] = 'Enable the features below to be displayed on the Moodle login page.';
$string['logintopimage'] = 'Login Page Image';
$string['logintopimage_desc'] = 'Upload an image that will be placed to the right of the login form.';
$string['featuretext'] = 'Featured Text Box';
$string['featuretext_desc'] = 'One of three featured textboxes that appear below the login form.';
$string['logintoptext'] = 'Top Textbox';
$string['logintoptext_desc'] = 'This is a full-width textbox that appears just below the image on the login page.';
$string['loginbottomtext'] = 'Bottom Textbox';
$string['loginbottomtext_desc'] = 'This is a full-width textbox that appears at the very bottom of the login page.';
$string['alert'] = 'Login Page Alert';
$string['alert_desc'] = 'Add a special alert on your homepage such as an emergency.';
