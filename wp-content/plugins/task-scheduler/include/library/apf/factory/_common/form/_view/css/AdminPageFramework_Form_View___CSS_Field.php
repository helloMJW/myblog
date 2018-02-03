<?php 
/**
	Admin Page Framework v3.8.6 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/task-scheduler>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class TaskScheduler_AdminPageFramework_Form_View___CSS_Field extends TaskScheduler_AdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getFormFieldRules();
    }
    static private function _getFormFieldRules() {
        return "td.task-scheduler-field-td-no-title {padding-left: 0;padding-right: 0;}.task-scheduler-fields {display: table; width: 100%;table-layout: fixed;}.task-scheduler-field input[type='number'] {text-align: right;} .task-scheduler-fields .disabled,.task-scheduler-fields .disabled input,.task-scheduler-fields .disabled textarea,.task-scheduler-fields .disabled select,.task-scheduler-fields .disabled option {color: #BBB;}.task-scheduler-fields hr {border: 0; height: 0;border-top: 1px solid #dfdfdf; }.task-scheduler-fields .delimiter {display: inline;}.task-scheduler-fields-description {margin-bottom: 0;}.task-scheduler-field {float: left;clear: both;display: inline-block;margin: 1px 0;}.task-scheduler-field label{display: inline-block; width: 100%;}.task-scheduler-field .task-scheduler-input-label-container {margin-bottom: 0.25em;}@media only screen and ( max-width: 780px ) { .task-scheduler-field .task-scheduler-input-label-container {margin-bottom: 0.5em;}} .task-scheduler-field .task-scheduler-input-label-string {padding-right: 1em; vertical-align: middle; display: inline-block; }.task-scheduler-field .task-scheduler-input-button-container {padding-right: 1em; }.task-scheduler-field .task-scheduler-input-container {display: inline-block;vertical-align: middle;}.task-scheduler-field-image .task-scheduler-input-label-container { vertical-align: middle;}.task-scheduler-field .task-scheduler-input-label-container {display: inline-block; vertical-align: middle; } .repeatable .task-scheduler-field {clear: both;display: block;}.task-scheduler-repeatable-field-buttons {float: right; margin: 0.1em 0 0.5em 0.3em;vertical-align: middle;}.task-scheduler-repeatable-field-buttons .repeatable-field-button {margin: 0 0.1em;font-weight: normal;vertical-align: middle;text-align: center;}@media only screen and (max-width: 960px) {.task-scheduler-repeatable-field-buttons {margin-top: 0;}}.task-scheduler-sections.sortable-section > .task-scheduler-section,.sortable > .task-scheduler-field {clear: both;float: left;display: inline-block;padding: 1em 1.32em 1em;margin: 1px 0 0 0;border-top-width: 1px;border-bottom-width: 1px;border-bottom-style: solid;-webkit-user-select: none;-moz-user-select: none;user-select: none; text-shadow: #fff 0 1px 0;-webkit-box-shadow: 0 1px 0 #fff;box-shadow: 0 1px 0 #fff;-webkit-box-shadow: inset 0 1px 0 #fff;box-shadow: inset 0 1px 0 #fff;-webkit-border-radius: 3px;border-radius: 3px;background: #f1f1f1;background-image: -webkit-gradient(linear, left bottom, left top, from(#ececec), to(#f9f9f9));background-image: -webkit-linear-gradient(bottom, #ececec, #f9f9f9);background-image: -moz-linear-gradient(bottom, #ececec, #f9f9f9);background-image: -o-linear-gradient(bottom, #ececec, #f9f9f9);background-image: linear-gradient(to top, #ececec, #f9f9f9);border: 1px solid #CCC;background: #F6F6F6;} .task-scheduler-fields.sortable {margin-bottom: 1.2em; } .task-scheduler-field .button.button-small {width: auto;} .font-lighter {font-weight: lighter;} .task-scheduler-field .button.button-small.dashicons {font-size: 1.2em;padding-left: 0.2em;padding-right: 0.22em;}.task-scheduler-field-title {font-weight: 600;min-width: 80px;margin-right: 1em;}.task-scheduler-fieldset {font-weight: normal;}.task-scheduler-input-label-container,.task-scheduler-input-label-string{min-width: 140px;}";
    }
    protected function _getVersionSpecific() {
        $_sCSSRules = '';
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= ".task-scheduler-field .remove_value.button.button-small {line-height: 1.5em; }";
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            $_sCSSRules.= ".task-scheduler-repeatable-field-buttons {margin: 2px 0 0 0.3em;} @media screen and ( max-width: 782px ) {.task-scheduler-fieldset {overflow-x: hidden;}}";
        }
        return $_sCSSRules;
    }
}
