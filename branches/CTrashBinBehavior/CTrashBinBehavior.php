<?php
/**
 * CTrashBinBehavior class file.
 *
 * Trash bin behavior for models.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 * @link http://code.google.com/p/yiiext/source/browse/#svn/trunk/app/extensions/CTrashBinBehavior
 *
 * @version 0.1
 */
class CTrashBinBehavior extends CActiveRecordBehavior {
    /**
     * @var string The name of the table where data stored.
     * Required to set on init behavior. No defaults.
     */
    public $trashFlagField = NULL;
    /**
     * @var mixed The value to set for removed model.
     * Default is 1.
     */
    public $removedFlag = 1;
    /**
     * @var mixed The value to set for restored model.
     * Default is 0.
     */
    public $restoredFlag = 0;

    public function attach($owner) {
        // Check required var trashFlagField
        if (!is_string($this->trashFlagField) || empty($this->trashFlagField)) {
            throw new CException(Yii::t('CEAV', 'Required var "{class}.{property}" not set.',
                array('{class}' => get_class($this), '{property}' => 'trashFlagField')));
        }
        parent::attach($owner);
    }

    /**
     * Remove model in trash bin.
     *
     * @return CActiveRecord
     */
    public function remove() {
        $this->getOwner()->{$this->trashFlagField} = $this->removedFlag;
        return $this->getOwner();
    }
    
    /**
     * Restore model from trash bin.
     *
     * @return CActiveRecord
     */
    public function restore() {
        $this->getOwner()->{$this->trashFlagField} = $this->restoredFlag;
        return $this->getOwner();
    }

    /**
     * Check if model is removd in trash bin.
     *
     * @return bool
     */
    public function isRemoved() {
        return $this->getOwner()->{$this->trashFlagField} == $this->removedFlag;
    }

    /**
     * Add condition before find, for except models from trash bin.
     *
     * @param CEvent
     */
    public function beforeFind($event) {
        if ($this->getEnabled()) {
            $this->getOwner()
                ->getDbCriteria()
                ->addCondition($this->trashFlagField . ' != "' . $this->removedFlag . '"');
        }
        parent::beforeFind($event);
    }
    
}
