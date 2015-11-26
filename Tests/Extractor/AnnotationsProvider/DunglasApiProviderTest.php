<?php

/*
* This file is part of the NayzoApiDocBundle.
*
* (c) Nayzo <alakhefifi@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Nayzo\ApiDocBundle\Tests\Extractor\AnnotationsProvider;

use Nayzo\ApiDocBundle\Tests\WebTestCase;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DunglasApiProviderTest extends WebTestCase
{
    protected function setUp()
    {
        if (!class_exists('Dunglas\ApiBundle\DunglasApiBundle')) {
            $this->markTestSkipped(
                'DunglasApiBundle is not available.'
            );
        }
    }

    public function testGetAnnotations()
    {
        $container = $this->getContainer();
        $provider = $container->get('nayzo_api_doc.annotations_provider.dunglas_api_annotation_provider');

        $annotations = $provider->getAnnotations();
        $this->assertCount(5, $annotations);

        foreach ($annotations as $annotation) {
            $this->assertInstanceOf('Nayzo\ApiDocBundle\Annotation\ApiDoc', $annotation);
            $this->assertInstanceOf('Symfony\Component\Routing\Route', $annotation->getRoute());
            $this->assertTrue('' != $annotation->getDescription());
        }
    }
}
