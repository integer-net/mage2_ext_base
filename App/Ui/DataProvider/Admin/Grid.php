<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Flancer32\Base\App\Ui\DataProvider\Admin;


class Grid
    extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{

    /** @var \Flancer32\Base\App\Repo\Query\ClauseSet\Adapter */
    protected $adptClauseSet;
    /** @var  \Magento\Framework\DB\Adapter\AdapterInterface */
    protected $conn;
    /** @var \Flancer32\Base\App\Repo\Query\ClauseSet\Processor */
    protected $procClauseSet;
    /** @var \Flancer32\Base\App\Repo\Query\Grid */
    protected $qGrid;
    /** @var \Magento\Framework\App\ResourceConnection */
    protected $resource;

    public function __construct(
        $name,
        \Flancer32\Base\App\Repo\Query\Grid $qGrid
    ) {
        /* create objects using manager (yes, it's not a good practice) */
        /** @var \Magento\Framework\ObjectManagerInterface $obm */
        $obm = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $obm->get(\Magento\Framework\App\ResourceConnection::class);
        $reporting = $obm->get(\Magento\Framework\Api\Search\ReportingInterface::class);
        $searchCriteriaBuilder = $obm->get(\Magento\Framework\Api\Search\SearchCriteriaBuilder::class);
        $request = $obm->get(\Magento\Framework\App\RequestInterface::class);
        $filterBuilder = $obm->get(\Magento\Framework\Api\FilterBuilder::class);
        $url = $obm->get(\Magento\Framework\UrlInterface::class);
        $adptClauseSet = $obm->get(\Flancer32\Base\App\Repo\Query\ClauseSet\Adapter::class);
        $procClauseSet = $obm->get(\Flancer32\Base\App\Repo\Query\ClauseSet\Processor::class);

        /* hardcoded args */
        $primaryFieldName = 'id';
        $requestFieldName = 'id';
        $meta = [];
        $updateUrl = $url->getRouteUrl('mui/index/render');
        $data = [
            'config' => [
                'component' => 'Magento_Ui/js/grid/provider',
                'update_url' => $updateUrl
            ]
        ];

        /* normal constructor as if args were passed */
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data);
        $this->resource = $resource;
        $this->conn = $resource->getConnection();
        $this->adptClauseSet = $adptClauseSet;
        $this->procClauseSet = $procClauseSet;
        $this->qGrid = $qGrid;
    }

    public function getData()
    {
        /* Magento API criteria */
        $criteria = $this->getSearchCriteria();
        $clauses = $this->adptClauseSet->getClauseSet($criteria);

        $qTotal = $this->qGrid->getCountQuery();
        $this->procClauseSet->exec($qTotal, $clauses, true);
        $totals = $this->conn->fetchOne($qTotal);

        $qItems = $this->qGrid->getSelectQuery();
        $this->procClauseSet->exec($qItems, $clauses);
        $items = $this->conn->fetchAll($qItems);
        $result = [
            'items' => $items,
            'totalRecords' => $totals
        ];
        return $result;
    }
}