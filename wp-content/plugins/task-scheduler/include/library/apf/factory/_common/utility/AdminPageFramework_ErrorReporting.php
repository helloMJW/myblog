<?php 
/**
	Admin Page Framework v3.8.6 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/task-scheduler>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class TaskScheduler_AdminPageFramework_ErrorReporting {
    private $_aLevels = array(1 => 'E_ERROR', 2 => 'E_WARNING', 4 => 'E_PARSE', 8 => 'E_NOTICE', 16 => 'E_CORE_ERROR', 32 => 'E_CORE_WARNING', 64 => 'E_COMPILE_ERROR', 128 => 'E_COMPILE_WARNING', 256 => 'E_USER_ERROR', 512 => 'E_USER_WARNING', 1024 => 'E_USER_NOTICE', 2048 => 'E_STRICT', 4096 => 'E_RECOVERABLE_ERROR', 8192 => 'E_DEPRECATED', 16384 => 'E_USER_DEPRECATED');
    private $_iLevel;
    public function __construct($iLevel = null) {
        $this->_iLevel = null !== $iLevel ? $iLeevl : error_reporting();
    }
    public function getErrorLevel() {
        return $this->_getErrorDescription($this->_getIncluded());
    }
    private function _getIncluded() {
        $_aIncluded = array();
        foreach ($this->_aLevels as $_iLevel => $iLevelText) {
            if ($this->_iLevel & $_iLevel) {
                $_aIncluded[] = $_iLevel;
            }
        }
        return $_aIncluded;
    }
    private function _getErrorDescription($aIncluded) {
        $_iAll = count($this->_aLevels);
        $_aValues = array();
        if (count($aIncluded) > $_iAll / 2) {
            $_aValues[] = 'E_ALL';
            foreach ($this->_aLevels as $_iLevel => $iLevelText) {
                if (!in_array($_iLevel, $aIncluded)) {
                    $_aValues[] = $iLevelText;
                }
            }
            return implode(' & ~', $_aValues);
        }
        foreach ($aIncluded as $_iLevel) {
            $_aValues[] = $this->_aLevels[$_iLevel];
        }
        return implode(' | ', $_aValues);
    }
}