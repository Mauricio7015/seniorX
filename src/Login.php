<?php

namespace OmieLaravel\Omie\src;
use OmieLaravel\Omie\src\Connection;

class Login
{

    public $http;
    protected $cliente;

    public function __construct()
    {
        $this->http = new Connection();
    }

    /**
    * Recupera todas as contas
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#ListarContasCorrentes
     * @param Integer $pagina, $registros_por_pagina
     * @param String $apenas_importado, S/N
     * @return json
     */
    public function logar($username, $password)
    {
        return $this->http->post('authentication/actions/login/', [
            "username"  => $username,
            "password"  => $password,
        ]);
    }


    /**
    * Consulta os dados de uma conta
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#ConsultarContaCorrente
    * @param String $idOmie
    * @param String $idInterno
    * @return json
    */
    public function consultar($idOmie = "", $idInterno = "")
    {
        return $this->http->post('/geral/contacorrente/', [

            "nCodCC"    => $idOmie,
            "cCodCCInt" => $idInterno

        ], 'ConsultarContaCorrente');
    }

    /**
    * Exclui uma conta da base de dados.
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#ExcluirContaCorrente
    * @param String $idOmie
    * @param String $idInterno
    * @return json
    */
    public function excluir($idOmie = "", $idInterno = "")
    {
        return $this->http->post('/geral/contacorrente/', [

            "nCodCC"    => $idOmie,
            "cCodCCInt" => $idInterno

        ], 'ExcluirContaCorrente');
    }


    /**
    * Altera os dados da conta
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#AlterarContaCorrente
    * @param Array $conta
    * @return json
    */
    public function alterar($conta)
    {
        return $this->http->post(

            '/geral/contacorrente/',
            $conta,
            'AlterarContaCorrente'
        );
    }

    /**
    * Altera se existir ou inclui uma conta
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#UpsertContaCorrente
    * @param Array $conta
    * @return json
    */
    public function upsert($conta)
    {
        return $this->http->post(

            '/geral/contacorrente/',
            $conta,
            'UpsertContaCorrente'
        );
    }


    /**
    * Inclui o cliente no Omie
    *
    * @see https://app.omie.com.br/api/v1/geral/contacorrente/#IncluirContaCorrente
    * @param Array $conta
    * @return json
    */
    public function incluir($conta)
    {
        return $this->http->post(

            '/geral/contacorrente/',
            $conta,
            'IncluirContaCorrente'
        );
    }

}
