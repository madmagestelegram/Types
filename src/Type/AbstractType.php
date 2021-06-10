<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

abstract class AbstractType {

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    abstract public static function _getPropertyNames(): array;

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    abstract public function _getData(): array;

    protected function normalizeData(array $data):array {
        $data = array_filter($data);
        array_walk_recursive($data, static function(&$item){
            $item = $item instanceof AbstractType ? $item->_getData(): $item;
        });

        return $data;
    }

}