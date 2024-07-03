<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeP0043 extends Make{
    use UteisMake;

    protected $campos = null;
    protected $relacionamentos = array();

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'P43';
    
    const NMRELACIOPAI = '';

    const IDTABELA = '92';
   
    const NMTABELA = 'CPARCEIROCOMERCIAL';

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO, null,  array(
            'NmRelacioPai' => self::NMRELACIOPAI,
            'idTabela' => self::IDTABELA,
            'nmTabela' => self::NMTABELA,
        ));
    }

    public function fieldCampos(stdClass $std){

        $possible = [
            'TPPARCEIROCOMERCIAL', 
            'CDPARCEIROCOMERCIAL', 
            'NMPARCEIROCOMERCIAL', 
            'TPPESSOA', 
            'STCONTRIBUINTEICMS', 
            'STREGCREDICMS', 
            'STEXIGEAGENDAMENTO', 
            'TPAGENDAMENTO', 
            'NOCGCCPF', 
            'TPEMPRESA', 
            'DSINSCRESTADUAL', 
            'DSINSCRMUNICIPAL', 
            'STMSGAGENDAAUTO', 
            'TPAREAATUACAO', 
            'DTNASCIMENTO', 
            'GERENCIAADMINISTRATIVA_CDGERENCIAADMINISTRATIVA', 
            'PARGRUPO_CDPARGRUPO', 
            'STCADASTRAMENTOPENDENTE', 
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $this->campos,
            "TPPARCEIROCOMERCIAL",
            $std->TPPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDPARCEIROCOMERCIAL",
            $std->CDPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "NMPARCEIROCOMERCIAL",
            $std->NMPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPPESSOA",
            $std->TPPESSOA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STCONTRIBUINTEICMS",
            $std->STCONTRIBUINTEICMS,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STREGCREDICMS",
            $std->STREGCREDICMS,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STEXIGEAGENDAMENTO",
            $std->STEXIGEAGENDAMENTO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPAGENDAMENTO",
            $std->TPAGENDAMENTO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "NOCGCCPF",
            $std->NOCGCCPF,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPEMPRESA",
            $std->TPEMPRESA,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DSINSCRESTADUAL",
            $std->DSINSCRESTADUAL,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DSINSCRMUNICIPAL",
            $std->DSINSCRMUNICIPAL,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STMSGAGENDAAUTO",
            $std->STMSGAGENDAAUTO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPAREAATUACAO",
            $std->TPAREAATUACAO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DTNASCIMENTO",
            $std->DTNASCIMENTO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "GERENCIAADMINISTRATIVA_CDGERENCIAADMINISTRATIVA",
            $std->GERENCIAADMINISTRATIVA_CDGERENCIAADMINISTRATIVA,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "GERENCIAADMINISTRATIVA_CDGERENCIAADMINISTRATIVA",
            $std->GERENCIAADMINISTRATIVA_CDGERENCIAADMINISTRATIVA,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARGRUPO_CDPARGRUPO",
            $std->PARGRUPO_CDPARGRUPO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STCADASTRAMENTOPENDENTE",
            $std->STCADASTRAMENTOPENDENTE,
            true,
            ""
        );

        $this->createRelationshipCeEndereco($std, array(
            'NmRelacioPai' => 'CEND_CPARCOM',
            'nmTabela' => 'CENDERECO',
        ));
        
        $this->createRelationshipContato($std, array(
            'NmRelacioPai' => 'CPARCONTATO',
            'nmTabela' => 'CPAR_CPARCTO',
        ));
    }

    private function createRelationshipContato($std, $attributes){

        $possibles = [
            'MEIOCOMUNICACAO_CDMEIOCOMUNICACAO', 
            'DSPARCONTATO', 
            'STRECAVISODIFCOBRANCA', 
            'STRECAVISOATRAZOENTREGA', 
            'STRECAVISOCONFIRMACAOST', 
        ];

        $isCreate = false;

        foreach($possibles as $possible){

            if($std->{$possible}){
                $isCreate = true;
                break;
            }
        }

        if ($isCreate){

            $std = $this->equilizeParameters($std, $possibles);

            $DadosTabela = $this->dom->createElement('DadosTabela');

            foreach($attributes as $key => $attribute){
                
                $DadosTabela->setAttribute($key, $attribute);
            }
    
            $Linha = $this->dom->createElement('Linha');
    
            $Campos = $this->dom->createElement('Campos');
    
            $this->dom->addChild(
                $Campos,
                "MEIOCOMUNICACAO_CDMEIOCOMUNICACAO",
                $std->MEIOCOMUNICACAO_CDMEIOCOMUNICACAO,
                false,
                ""
            );

            $this->dom->addChild(
                $Campos,
                "DSPARCONTATO",
                $std->DSPARCONTATO,
                false,
                ""
            );

            $this->dom->addChild(
                $Campos,
                "STRECAVISODIFCOBRANCA",
                $std->STRECAVISODIFCOBRANCA,
                false,
                ""
            );

            $this->dom->addChild(
                $Campos,
                "STRECAVISOATRAZOENTREGA",
                $std->STRECAVISOATRAZOENTREGA,
                false,
                ""
            );

            $this->dom->addChild(
                $Campos,
                "STRECAVISOCONFIRMACAOST",
                $std->STRECAVISOCONFIRMACAOST,
                false,
                ""
            );

            $this->dom->appChild($Linha, $Campos);

            $this->dom->appChild($DadosTabela, $Linha);
    
            $this->relacionamentos[] = $DadosTabela;
        }
    }
    
    private function createRelationshipCeEndereco($std, $attributes){

        $possible = [
            'DSENDERECO', 
            'DSBAIRRO', 
            'NOCEP', 
            'CIDADE', 
            'CDUF', 
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $DadosTabela = $this->dom->createElement('DadosTabela');

        foreach($attributes as $key => $attribute){
            
            $DadosTabela->setAttribute($key, $attribute);
        }

        $Linha = $this->dom->createElement('Linha');

        $Campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $Campos,
            "DSENDERECO",
            $std->DSENDERECO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "DSBAIRRO",
            $std->DSBAIRRO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "NOCEP",
            $std->NOCEP,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "CIDADE",
            $std->CIDADE,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "CDUF",
            $std->CDUF,
            true,
            ""
        );

        $this->dom->appChild($Linha, $Campos);

        $this->dom->appChild($DadosTabela, $Linha);

        $this->relacionamentos[] = $DadosTabela;
    }

    public function monta(){

        $this->makeStructureDefault($this->campos, $this->relacionamentos);

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();

        return true;

    }
    
}
