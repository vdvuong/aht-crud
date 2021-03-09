<?php

namespace AHT\Crud\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;

		$installer->startSetup();
		$connection = $installer->getConnection();

		if (version_compare($context->getVersion(), '1.0.1', '<')) {
			if (!$installer->tableExists('crud')) {
				$table = $installer->getConnection()->newTable($installer->getTable('crud'))
					->addColumn(
						'id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'ID'
					)
					->addColumn(
						'title',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						100,
						['nullable => false'],
						'Title'
					)
					->addColumn(
						'detail',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						50,
						[],
						'Detail'
					)
					->setComment('Crud Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('crud'),
					$setup->getIdxName(
						$installer->getTable('crud'),
						['title', 'detail'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['title', 'detail'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}
		$installer->endSetup();
	}
}
