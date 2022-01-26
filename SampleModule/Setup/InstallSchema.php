<?php
namespace Mastering\SampleModule\Setup;

use Laminas\Text\Table\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable(
            $setup->getTable('mastering_sample_item')
        )->addColumn('id', Table::TYPE_INTEGER,NULL,['identity' =>true, 'nullable'=>false,
            'primary' => true]
        )->addColumn('id', Table::TYPE_TEXT,255, ['nullable'=>false],
        'Item Name')->addIndex($setup->getIdxName('mastering_sample_item',['name']), ['name']
        )->setComment(
            'Sample Itens'
        );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}
