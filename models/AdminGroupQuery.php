<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AdminGroup]].
 *
 * @see AdminGroup
 */
class AdminGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AdminGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AdminGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}