<?php

/*
 * Copyright (C) 2015 Mihailov Vasilievic Filho
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Siscourb\Issue\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Siscourb\Issue\Entity\Category;

/**
 * Description of CategoryFixture
 *
 * @author Mihailov Vasilievic Filho <mihailov.vf@gmail.com>
 */
class IssuesFixture extends AbstractFixture
{

    public function load(ObjectManager $manager)
    {
        //Ruas
        $ruas = new Category();
        $ruas->setName('Ruas');
        $ruas->setDescription('Necessidades relacionadas as manutenção e ampliação'
                . ' de vias urbanas (ruas, avenidas, estradas municipais, etc).');
        
        $asfalto = new \Siscourb\Issue\Entity\Issue();
        $asfalto->setName('Asfaltamento de rua');
        $asfalto->setDescription('Rua com necessidade de Asfaltamento/Recapeamento.');
        $asfalto->addCategory($ruas);
        
        $manager->persist($ruas);
        $manager->flush($ruas);
        
        $ruaEsburacada = new \Siscourb\Issue\Entity\Issue();
        $ruaEsburacada->setName('Rua Esburacada');
        $ruaEsburacada->setDescription('Rua não asfaltada com buracos e/ou valas.');
        $ruaEsburacada->addCategory($ruas);
        
        $manager->persist($asfalto);
        $manager->persist($ruaEsburacada);
        $manager->flush();
        
        //Saneamento
        $saneamento = new Category();
        $saneamento->setName('Saneamento');
        $saneamento->setDescription('Necessidades relacionadas a reparos e ampliações'
                . ' de serviços de saneamento básico (água e esgoto).');
        $manager->persist($saneamento);
        
        //Saúde
        $saude = new Category();
        $saude->setName('Saúde');
        $saude->setDescription('Necessidades relacionadas a problemas e melhorias'
                . ' de serviços públicos de saúde.');
        $manager->persist($saude);
        
        //Arvores
        $arvores = new Category();
        $arvores->setName('Arvores');
        $arvores->setDescription('Necessidades relacionadas a manutenção de árvores em locais públicos.');
        $manager->persist($arvores);
        
        //Lixo
        $lixo = new Category();
        $lixo->setName('Lixo');
        $lixo->setDescription('Necessidades relacionadas a limpeza de locais públicos'
                . ' e casos de risco a saúde pública.');
        $manager->persist($lixo);
        
        //Parques
        $parques = new Category();
        $parques->setName('Praças e Parques');
        $parques->setDescription('Necessidades relacionadas a manutenção de praças e parques.');
        $manager->persist($parques);
        
        //Iluminação
        $iluminacao = new Category();
        $iluminacao->setName('Iluminação');
        $iluminacao->setDescription('Necessidades relacionadas a manutenção e ampliação'
                . ' da rede de iluminação pública.');
        $manager->persist($iluminacao);
        
        $manager->flush();
    }
}
