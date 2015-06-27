<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MemberType]].
 *
 * @see MemberType
 */
class MemberTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MemberType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MemberType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}