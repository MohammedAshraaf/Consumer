<?php

namespace Consumer;

use Consumer\Database\DatabaseRepoInterface;
use Consumer\DataSource\DataSourceInterface;

class Consumer
{
    /**
     * The source where the consumer fetches the data
     * @var DataSourceInterface
     */
    protected $source;

    /**
     * Consumer constructor.
     * @param DataSourceInterface $source, the class responsible with fetching the data
     */
    public function __construct(DataSourceInterface $source)
    {
        $this->source = $source;
    }

    /**
     * Consumes the products
     * @param DatabaseRepoInterface $repo, the class responsible for dealing with database
     */
    public function consume(DatabaseRepoInterface $repo)
    {
        // fetch products from the source
        $products = $this->source->getData();

        // Save the products inside the database
        $repo->save($products);
    }
}
