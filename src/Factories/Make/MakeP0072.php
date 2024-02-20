<?php

namespace Focus599Dev\GKO\Factories\Make;

use Focus599Dev\GKO\Factories\Make\traits\UteisMake;
use stdClass;

class MakeP0072 extends Make{
    use UteisMake;

    protected $campos = null;

    protected $relacionamentos = array();

    protected $itens = [];

    const TPSERVICO = 'impdados';

    const CDINTEGRACAO = 'P72';

    public function __construct()
    {
        
        parent::__construct(self::TPSERVICO, self::CDINTEGRACAO);
    }

    public function fieldCampos(stdClass $std){

        $possible = [
            'TPDOCUMENTO',
            'PAREMITENTE_TPPARCEIROCOMERCIAL',
            'PAREMITENTE_CDPARCEIROCOMERCIAL',
            'PAREMITENTE_NOCGCCPF',
            'CDNOTA',
            'CDSERIE',
            'PARRESPONSAVELFRETE_CDPARCEIROCOMERCIAL',
            'PARRESPONSAVELFRETE_NOCGCCPF',
            'PARDESTREMET_TPPARCEIROCOMERCIAL',
            'PARDESTREMET_CDPARCEIROCOMERCIAL',
            'PARDESTREMET_NOCGCCPF',
            'TPENTRADASAIDA',
            'TIPONOTA_CDTIPONOTA',
            'TIPOCARGA_CDTIPOCARGA',
            'DTEMISSAO',
            'DTREGISTRO',
            'DTEMBARQUE',
            'DSCHAVEACESSO',
            'TPFRETE',
            'TERRITORIO_CDTERRITORIO',
            'VENDEDOR_CDVENDEDOR',
            'DSSEPARADORCONHECIMENTO',
            'DSLOTE',
            'PARTRANSPORTADORA_NOCGCCPF',
            'PARTRP_SISCORPORATIVO',
            'EQUIPAMENTO_CDEQUIPAMENTO',
            'MEIOTRANSPORTE_CDMEIOTRANSPORTE',
            'CDDOCUMENTOVINCULADO',
            'STFRETEDIFERENCIADO',
            'STSUBSTTRIBUTARIAICMS',
            'STITEMSUBTRIBNACOMPRA',
            'EMBALAGEM_CDEMBALAGEM',
            'STISENTOIMPOSTO',
            'NATUREZAOPERACAO_CDNATUREZAOPERACAO',
            'VRPESOBRUTO',
            'VRPESOCUBADO',
            'VRPESOLIQUIDO',
            'QTVOLUME',
            'STCADASTRAMENTOPENDENTE',
            'STEMELABORACAO',
            'TPSTATUSDNE',
            'OBSERVACAO_1',
            'OBSERVACAO_2',
            'OBSERVACAO_3',
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $this->campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $this->campos,
            "TPDOCUMENTO",
            $std->TPDOCUMENTO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PAREMITENTE_TPPARCEIROCOMERCIAL",
            $std->PAREMITENTE_TPPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PAREMITENTE_CDPARCEIROCOMERCIAL",
            $std->PAREMITENTE_CDPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PAREMITENTE_NOCGCCPF",
            $std->PAREMITENTE_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDNOTA",
            $std->CDNOTA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDSERIE",
            $std->CDSERIE,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARRESPONSAVELFRETE_CDPARCEIROCOMERCIAL",
            $std->PARRESPONSAVELFRETE_CDPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARRESPONSAVELFRETE_NOCGCCPF",
            $std->PARRESPONSAVELFRETE_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARDESTREMET_TPPARCEIROCOMERCIAL",
            $std->PARDESTREMET_TPPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARDESTREMET_CDPARCEIROCOMERCIAL",
            $std->PARDESTREMET_CDPARCEIROCOMERCIAL,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARDESTREMET_NOCGCCPF",
            $std->PARDESTREMET_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPENTRADASAIDA",
            $std->TPENTRADASAIDA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TIPONOTA_CDTIPONOTA",
            $std->TIPONOTA_CDTIPONOTA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TIPOCARGA_CDTIPOCARGA",
            $std->TIPOCARGA_CDTIPOCARGA,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DTEMISSAO",
            $std->DTEMISSAO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DTREGISTRO",
            $std->DTREGISTRO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DTEMBARQUE",
            $std->DTEMBARQUE,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DSCHAVEACESSO",
            $std->DSCHAVEACESSO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPFRETE",
            $std->TPFRETE,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TERRITORIO_CDTERRITORIO",
            $std->TERRITORIO_CDTERRITORIO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "VENDEDOR_CDVENDEDOR",
            $std->VENDEDOR_CDVENDEDOR,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DSSEPARADORCONHECIMENTO",
            $std->DSSEPARADORCONHECIMENTO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "DSLOTE",
            $std->DSLOTE,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARTRANSPORTADORA_NOCGCCPF",
            $std->PARTRANSPORTADORA_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "PARTRP_SISCORPORATIVO",
            $std->PARTRP_SISCORPORATIVO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "EQUIPAMENTO_CDEQUIPAMENTO",
            $std->EQUIPAMENTO_CDEQUIPAMENTO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "MEIOTRANSPORTE_CDMEIOTRANSPORTE",
            $std->MEIOTRANSPORTE_CDMEIOTRANSPORTE,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "CDDOCUMENTOVINCULADO",
            $std->CDDOCUMENTOVINCULADO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STFRETEDIFERENCIADO",
            $std->STFRETEDIFERENCIADO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STSUBSTTRIBUTARIAICMS",
            $std->STSUBSTTRIBUTARIAICMS,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STITEMSUBTRIBNACOMPRA",
            $std->STITEMSUBTRIBNACOMPRA,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "EMBALAGEM_CDEMBALAGEM",
            $std->EMBALAGEM_CDEMBALAGEM,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STISENTOIMPOSTO",
            $std->STISENTOIMPOSTO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "NATUREZAOPERACAO_CDNATUREZAOPERACAO",
            $std->NATUREZAOPERACAO_CDNATUREZAOPERACAO,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "VRPESOBRUTO",
            $std->VRPESOBRUTO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "VRPESOCUBADO",
            $std->VRPESOCUBADO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "VRPESOLIQUIDO",
            $std->VRPESOLIQUIDO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "QTVOLUME",
            $std->QTVOLUME,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STCADASTRAMENTOPENDENTE",
            $std->STCADASTRAMENTOPENDENTE,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "STEMELABORACAO",
            $std->STEMELABORACAO,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "TPSTATUSDNE",
            $std->TPSTATUSDNE,
            true,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "OBSERVACAO_1",
            $std->OBSERVACAO_1,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "OBSERVACAO_2",
            $std->OBSERVACAO_2,
            false,
            ""
        );

        $this->dom->addChild(
            $this->campos,
            "OBSERVACAO_3",
            $std->OBSERVACAO_3,
            false,
            ""
        );
        
    }

    public function createRelationshipItem($std, $attributes){

        $possible = [
            'ITEM_CDITEM',
            'NONTAITEM',
            'VRNTAITEM',
            'QTITEM',
            'DSUNITEM',
            'QTPESOBRUTO',
            'QTPESOLIQUIDO',
            'QTPESOCUBADO',
            'QTVRCUBAGEM',
            'QTVOLUME',
            'QTEMBTRANSP',
            'CODCENTROCUSTO',
            'CONTACONTABIL_CDCONTACONTABIL',
            'STCANCELADO',
            'STCREDITOICMS'
        ];
        
        $std = $this->equilizeParameters($std, $possible);

        $Linha = $this->dom->createElement('Linha');

        $Campos = $this->dom->createElement('Campos');

        $this->dom->addChild(
            $Campos,
            "ITEM_CDITEM",
            $std->ITEM_CDITEM,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "NONTAITEM",
            $std->NONTAITEM,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "VRNTAITEM",
            $std->VRNTAITEM,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTITEM",
            $std->QTITEM,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "DSUNITEM",
            $std->DSUNITEM,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTPESOBRUTO",
            $std->QTPESOBRUTO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTPESOLIQUIDO",
            $std->QTPESOLIQUIDO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTPESOCUBADO",
            $std->QTPESOCUBADO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTVRCUBAGEM",
            $std->QTVRCUBAGEM,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTVOLUME",
            $std->QTVOLUME,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "QTEMBTRANSP",
            $std->QTEMBTRANSP,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "CODCENTROCUSTO",
            $std->CODCENTROCUSTO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "CONTACONTABIL_CDCONTACONTABIL",
            $std->CONTACONTABIL_CDCONTACONTABIL,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCANCELADO",
            $std->STCANCELADO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCREDITOICMS",
            $std->STCREDITOICMS,
            true,
            ""
        );

        $this->dom->appChild($Linha, $Campos);

        $this->itens[] = $Linha;

    }


    public function makeItens($attributes){

        $DadosTabela = $this->dom->createElement('DadosTabela');

        foreach($attributes as $key => $attribute){
            
            $DadosTabela->setAttribute($key, $attribute);
        }

        foreach($this->itens as $item){

            $this->dom->appChild($DadosTabela, $item);

        }
        
        $this->relacionamentos[] = $DadosTabela;

    }

    public function createRelationshipMTexto($std, $attributes){

        $possible = [
            'TXMEMO',
            'STCANCELADO',
            'STCREDITOICMS',
            'STCREDITOIMP1',
            'STCREDITOIMP2',
            'STCREDITOIMP3',
            'DSOBSERVACAO',
            'OBSERVACAO_1',
            'OBSERVACAO_2',
            'OBSERVACAO_3',
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
            "TXMEMO",
            $std->TXMEMO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCANCELADO",
            $std->STCANCELADO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCREDITOICMS",
            $std->STCREDITOICMS,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCREDITOIMP1",
            $std->STCREDITOIMP1,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCREDITOIMP2",
            $std->STCREDITOIMP2,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STCREDITOIMP3",
            $std->STCREDITOIMP3,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "DSOBSERVACAO",
            $std->DSOBSERVACAO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "OBSERVACAO_1",
            $std->OBSERVACAO_1,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "OBSERVACAO_2",
            $std->OBSERVACAO_2,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "OBSERVACAO_3",
            $std->OBSERVACAO_3,
            false,
            ""
        );

        $this->dom->appChild($Linha, $Campos);

        $this->dom->appChild($DadosTabela, $Linha);

        $this->relacionamentos[] = $DadosTabela;
    }

    public function createRelationCredSP($std, $attributes){

        $possible = [
            'NOORDEMREDESPACHO',
            'PARREDESPACHO_TPPARCEIROCOMERCIAL',
            'PARREDESPACHO_CDPARCEIROCOMERCIAL',
            'PARREDESPACHO_NOCGCCPF',
            'PARTRPREDESPACHO_NOCGCCPF',
            'PARTRPREDESP_SISCORPORATIVO',
            'EQUIPAMENTO_CDEQUIPAMENTO',
            'MEIOTRASNPORTE_CDMEIOTRANSPORTE',
            'TIPOCONTRATO_CDTIPOCONTRATO',
            'TPFRETEREDESPACHO',
            'STFRETEDIFERENCIADO',
            'TPSTATUSTRECHO',
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
            "NOORDEMREDESPACHO",
            $std->NOORDEMREDESPACHO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "PARREDESPACHO_TPPARCEIROCOMERCIAL",
            $std->PARREDESPACHO_TPPARCEIROCOMERCIAL,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "PARREDESPACHO_CDPARCEIROCOMERCIAL",
            $std->PARREDESPACHO_CDPARCEIROCOMERCIAL,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "PARREDESPACHO_NOCGCCPF",
            $std->PARREDESPACHO_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "PARTRPREDESPACHO_NOCGCCPF",
            $std->PARTRPREDESPACHO_NOCGCCPF,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "PARTRPREDESP_SISCORPORATIVO",
            $std->PARTRPREDESP_SISCORPORATIVO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "EQUIPAMENTO_CDEQUIPAMENTO",
            $std->EQUIPAMENTO_CDEQUIPAMENTO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "MEIOTRASNPORTE_CDMEIOTRANSPORTE",
            $std->MEIOTRASNPORTE_CDMEIOTRANSPORTE,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "TIPOCONTRATO_CDTIPOCONTRATO",
            $std->TIPOCONTRATO_CDTIPOCONTRATO,
            false,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "TPFRETEREDESPACHO",
            $std->TPFRETEREDESPACHO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "STFRETEDIFERENCIADO",
            $std->STFRETEDIFERENCIADO,
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "TPSTATUSTRECHO",
            $std->TPSTATUSTRECHO,
            true,
            ""
        );

        $this->dom->appChild($Linha, $Campos);

        $this->dom->appChild($DadosTabela, $Linha);

        $this->relacionamentos[] = $DadosTabela;
    }

    public function createRelationEndereco($std, $attributes){

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
            true,
            ""
        );

        $this->dom->addChild(
            $Campos,
            "CIDADE",
            $std->CIDADE,
            false,
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

        if (count($this->itens)){
            
            $this->makeItens(array(
                'NmRelacioPai' => 'MNTA_MNTAITM',
                'nmTabela' => 'MNTAITEM',
            ));

        }

        $this->makeStructureDefault($this->campos, $this->relacionamentos);

        $this->dom->appendChild($this->GKO);

        $this->xml = $this->dom->saveXML();

        return true;

    }
    
}