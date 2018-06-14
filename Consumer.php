<?php


class Consumer
{
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
     * @param FormatDataInterface $formatData
     */
    public function consume(DatabaseRepoInterface $repo, FormatDataInterface $formatData)
    {
        $products = $this->source->getData();

        $products = $formatData->format($products);

        $repo->save($products);
    }
}

$consumer = new Consumer(new Products);

$consumer->consume(new ProductDatabase(), new ProductDatabaseFormat());
