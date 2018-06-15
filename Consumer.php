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
        // fetch products from the source
        $products = $this->source->getData();

        // Format the products to match the database
        $products = $formatData->format($products);

        // Save the products inside the database
        $repo->save($products);
    }
}
