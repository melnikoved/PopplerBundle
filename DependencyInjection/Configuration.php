<?php

namespace Melnikoved\PopplerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\NodeInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 */
class Configuration
{
    /**
     * Generates the configuration tree.
     *
     * @return NodeInterface
     */
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder
            ->root('melnikov_poppler', 'array')
                ->children()
                    ->scalarNode('pdfunite_path')
                    ->defaultValue('/opt/poppler19/bin/pdfunite')
                    ->end()
                ->end()
            ->end();

        return $treeBuilder->buildTree();
    }
}
