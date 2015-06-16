<?php

namespace Bcremer\SculpinExample;

use Dflydev\DotAccessConfiguration\Configuration;
use Sculpin\Core\Source\DataSourceInterface;
use Sculpin\Core\Source\MemorySource;
use Sculpin\Core\Source\SourceSet;

class MemoryDataSource implements DataSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function dataSourceId()
    {
        return 'MemoryDataSource:';
    }

    /**
     * {@inheritdoc}
     */
    public function refresh(SourceSet $sourceSet)
    {
        $source =  new MemorySource(
            'index.html.id',
            new Configuration(),
            'This is my index',
            '',
            'index.html',
            '',
            new \SplFileInfo('/tmp'),
            false,
            true,
            true
        );

        $sourceSet->mergeSource($source);

        $source =  new MemorySource(
            'testid',
            new Configuration(),
            'This is my content',
            '',
            'some-example.md',
            '',
            new \SplFileInfo('/tmp'),
            false,
            true,
            true
        );

        $sourceSet->mergeSource($source);
    }
}
