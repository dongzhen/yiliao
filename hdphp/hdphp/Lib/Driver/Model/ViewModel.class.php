<?php
// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.01
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------

/**
 * 视图模型处理类
 * @package     Model
 * @subpackage  Driver
 * @author      后盾向军 <houdunwangxj@gmail.com>
 */
class ViewModel extends Model
{
    /**
     * 视图关联表关系
     * @var array
     */
    public $view = array();
    /**
     * 这些方法需要改变驱动Db的相应opt['table']与opt['field']等属性值
     * @var array
     */
    private $queryMethod = array(
        'select', 'find', 'count', 'max', 'min', 'avg', 'sum'
    );

    /**
     * 魔术方法用于动态执行Db类中的方法
     * @param $method
     * @param $param
     * @return mixed
     */
    public function __call($method, $param)
    {
        if (in_array($method, $this->queryMethod)) {
            $this->setDriverOption();
        }
        /**
         * 调用父类方法完成查询操作
         */
        return parent::__call($method, $param);
    }

    /**
     * 设置查询表名与字段
     * 就是设置驱动Db的opt属性
     */
    private function setDriverOption()
    {
        $table = $this->getTable();
        $field = $this->getField();
        $this->db->opt['table'] = $table;
        $this->db->opt['field'] = $field;
    }

    /**
     * 查找满足条件的一条记录
     * @param string $where 条件,如果为数字查询主键值
     * @return mixed
     */
    public function find($where = '')
    {
        $result = $this->select($where);
        return is_array($result) ? current($result) : $result;
    }

    /**
     * 查询结果
     * @param string $where 条件
     * @return mixed
     */
    public function select($where = '')
    {
        $this->setDriverOption();
        $this->trigger && method_exists($this, '__before_select') && $this->__before_select();
        $return = $this->db->select($where);
        $this->trigger && method_exists($this, '__after_select') && $this->__after_select($return);
        return $return;
    }

    /**
     * 获得驱动表
     * 获得用于更改DbModel::$table值
     * 实例化时更改Db::$table值
     * 调用relation方法时更改Db::opt['table']值,用于本次查询临时改表
     * @return mixed
     */
    private function getTable()
    {
        /**
         * 没有定义view属性时不做任何处理
         * 事实上ViewModel操作全局依赖View属性定义
         */
        if (empty($this->view)) {
            return $this->db->opt['table'];
        }
        $from = '';
        foreach ($this->view as $table => $set) {
            /**
             * 表名设置
             */
            $as = isset($set['_as']) ? $set['_as'] : $table;
            $from .= C('DB_PREFIX') . $table . ' ' . $as;
            /**
             * 关联条件
             */
            if (isset($set['_on'])) {
                $from .= " ON  " . $set['_on'];
            }
            /**
             * _TYPE关联方式
             */
            if (isset($set['_type'])) {
                $from .= ' ' . strtoupper($set['_type']) . ' JOIN ';
            }
        }
        /**
         * 去除表后面关联操作符如INNER JOIN
         */
        return preg_replace('@(INNER|RIGHT|LEFT)\s*JOIN\s*$@', '', $from);

    }

    /**
     * 设置查询字段
     */
    private function getField()
    {
        /**
         * 字段设置
         * 如果链式操作中调用了field()方法,则不执行以下操作
         */
        if (empty($this->view) || ($this->db->opt['field'] != '*')) {
            return $this->db->opt['field'];
        }
        $field = array();
        foreach ($this->view as $table => $set) {
            //表名
            $as = isset($set['_as']) ? $set['_as'] : $table;
            /**
             * 当前表所有字段
             */
            $fieldData = array_keys($this->db->getAllField($table));
            /**
             * 设置别名字段
             */
            foreach ($set as $name => $f) {
                /**
                 * 特定关键词不处理
                 */
                if (in_array($name, array('_type', '_on', '_as'))) {
                    continue;
                }
                if (($index = array_search($name, $fieldData)) !== false) {
                    $field[] = $as . '.' . $name . ' AS ' . $f;
                }
            }
        }
        if (empty($field)) {
            return $this->db->opt['field'];
        } else {
            return '*,' . implode(',', $field);
        }
    }

}