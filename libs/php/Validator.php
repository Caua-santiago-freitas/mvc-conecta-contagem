<?php

/*
|--------------------------------------------------------------------------
| CLASSE VALIDATOR
|--------------------------------------------------------------------------
|
| Responsável por validar os dados recebidos de um formulário.
|
| Exemplo inicial:
|
| $validator = new Validator($_POST);
|
| $validator->required(
|     "nome",
|     "O nome é obrigatório."
| );
|
| if ($validator->fails()) {
|     print_r($validator->errors());
| }
|
*/

class Validator
{
    /*
    |--------------------------------------------------------------------------
    | 1. PROPRIEDADES
    |--------------------------------------------------------------------------
    */

    // Guarda os dados recebidos do formulário
    private $dados = [];

    // Guarda os erros encontrados
    private $erros = [];


    /*
    |--------------------------------------------------------------------------
    | 2. CONSTRUTOR
    |--------------------------------------------------------------------------
    |
    | O construtor recebe os dados que serão validados.
    |
    | Exemplo:
    |
    | $validator = new Validator($_POST);
    |
    */

    public function __construct($dados)
    {
        $this->dados = $dados;
    }


    /*
    |--------------------------------------------------------------------------
    | 3. MÉTODOS AUXILIARES
    |--------------------------------------------------------------------------
    |
    | Estes métodos são utilizados internamente pela classe.
    | Não são chamados diretamente no Controller.
    |
    */


    // Retorna o valor de um campo
    private function valor($campo)
    {
        return $this->dados[$campo] ?? "";
    }


    // Verifica se um campo está vazio
    private function vazio($campo)
    {
        $valor = $this->valor($campo);

        // Se for texto, remove espaços antes de verificar
        if (is_string($valor)) {
            return trim($valor) === "";
        }

        return empty($valor) && $valor !== 0 && $valor !== "0";
    }


    // Adiciona uma mensagem ao array de erros
    private function adicionarErro($campo, $mensagem)
    {
        // Se ainda não existem erros para o campo,
        // cria um array vazio
        if (!isset($this->erros[$campo])) {
            $this->erros[$campo] = [];
        }

        $this->erros[$campo][] = $mensagem;
    }


    // Campos opcionais vazios não precisam
    // passar pelas demais validações
    private function ignorarSeVazio($campo)
    {
        return $this->vazio($campo);
    }


    /*
    |--------------------------------------------------------------------------
    | 4. VALIDAÇÕES BÁSICAS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | REQUIRED
    |--------------------------------------------------------------------------
    |
    | Verifica se o campo foi preenchido.
    |
    | Exemplo:
    |
    | $validator->required(
    |     "nome",
    |     "O nome do produto é obrigatório."
    | );
    |
    */

    public function required($campo, $mensagem = null)
    {
        if ($this->vazio($campo)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo é obrigatório."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | STRING
    |--------------------------------------------------------------------------
    |
    | Verifica se o valor recebido é um texto.
    |
    | Exemplo:
    |
    | $validator->string(
    |     "nome",
    |     "O nome deve ser um texto válido."
    | );
    |
    */

    public function string($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        if (!is_string($this->valor($campo))) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve ser um texto."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 5. VALIDAÇÕES DE TAMANHO
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | MIN LENGTH
    |--------------------------------------------------------------------------
    |
    | Define a quantidade mínima de caracteres.
    |
    | Exemplo:
    |
    | $validator->minLength(
    |     "nome",
    |     3,
    |     "O nome deve conter no mínimo 3 caracteres."
    | );
    |
    */

    public function minLength($campo, $minimo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = trim($this->valor($campo));

        if (strlen($valor) < $minimo) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve ter pelo menos $minimo caracteres."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | MAX LENGTH
    |--------------------------------------------------------------------------
    |
    | Define a quantidade máxima de caracteres.
    |
    | Exemplo:
    |
    | $validator->maxLength(
    |     "nome",
    |     100,
    |     "O nome deve conter no máximo 100 caracteres."
    | );
    |
    */

    public function maxLength($campo, $maximo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = trim($this->valor($campo));

        if (strlen($valor) > $maximo) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve ter no máximo $maximo caracteres."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 6. VALIDAÇÕES NUMÉRICAS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | NUMERIC
    |--------------------------------------------------------------------------
    |
    | Verifica se o campo possui um valor numérico.
    |
    | Exemplos aceitos:
    |
    | 10
    | 10.50
    |
    | Exemplo:
    |
    | $validator->numeric(
    |     "preco",
    |     "O preço deve ser numérico."
    | );
    |
    */

    public function numeric($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        if (!is_numeric($this->valor($campo))) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve ser numérico."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | INTEGER
    |--------------------------------------------------------------------------
    |
    | Verifica se o valor é um número inteiro.
    |
    | Exemplo:
    |
    | $validator->integer(
    |     "quantidade",
    |     "A quantidade deve ser um número inteiro."
    | );
    |
    */

    public function integer($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (filter_var($valor, FILTER_VALIDATE_INT) === false) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve ser um número inteiro."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | MIN
    |--------------------------------------------------------------------------
    |
    | Define o menor valor permitido.
    |
    | Exemplo:
    |
    | $validator->min(
    |     "quantidade",
    |     1,
    |     "A quantidade deve ser maior ou igual a 1."
    | );
    |
    */

    public function min($campo, $minimo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!is_numeric($valor) || $valor < $minimo) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve ser no mínimo $minimo."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | MAX
    |--------------------------------------------------------------------------
    |
    | Define o maior valor permitido.
    |
    | Exemplo:
    |
    | $validator->max(
    |     "quantidade",
    |     100,
    |     "A quantidade deve ser no máximo 100."
    | );
    |
    */

    public function max($campo, $maximo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!is_numeric($valor) || $valor > $maximo) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve ser no máximo $maximo."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | BETWEEN
    |--------------------------------------------------------------------------
    |
    | Verifica se o valor está entre dois números.
    |
    | Exemplo:
    |
    | $validator->between(
    |     "idade",
    |     18,
    |     65,
    |     "A idade deve estar entre 18 e 65 anos."
    | );
    |
    */

    public function between($campo, $minimo, $maximo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (
            !is_numeric($valor)
            || $valor < $minimo
            || $valor > $maximo
        ) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve estar entre $minimo e $maximo."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 7. VALIDAÇÕES DE FORMATO
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | EMAIL
    |--------------------------------------------------------------------------
    |
    | Verifica se o e-mail possui um formato válido.
    |
    | Exemplo:
    |
    | $validator->email(
    |     "email",
    |     "Informe um e-mail válido."
    | );
    |
    */

    public function email($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "Informe um e-mail válido."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | URL
    |--------------------------------------------------------------------------
    |
    | Verifica se o endereço informado é uma URL válida.
    |
    | Exemplo:
    |
    | $validator->url(
    |     "site",
    |     "Informe uma URL válida."
    | );
    |
    */

    public function url($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!filter_var($valor, FILTER_VALIDATE_URL)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "Informe uma URL válida."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | REGEX
    |--------------------------------------------------------------------------
    |
    | Permite criar uma validação usando expressão regular.
    |
    | Exemplo: telefone com 10 ou 11 números.
    |
    | $validator->regex(
    |     "telefone",
    |     "/^[0-9]{10,11}$/",
    |     "Informe um telefone válido."
    | );
    |
    */

    public function regex($campo, $padrao, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!preg_match($padrao, $valor)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O formato do campo $campo é inválido."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | DATE
    |--------------------------------------------------------------------------
    |
    | Valida uma data no formato:
    |
    | dia/mês/ano
    |
    | Exemplo:
    |
    | $validator->date(
    |     "dataNascimento",
    |     "Informe uma data válida."
    | );
    |
    | Valor válido:
    |
    | 25/12/2026
    |
    */

    public function date($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        // Divide o texto usando a barra
        $partes = explode("/", $valor);

        // Uma data deve possuir dia, mês e ano
        if (count($partes) !== 3) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "Informe uma data no formato dia/mês/ano."
            );

            return $this;
        }

        $dia = $partes[0];
        $mes = $partes[1];
        $ano = $partes[2];

        // Verifica se a data realmente existe
        if (!checkdate($mes, $dia, $ano)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "Informe uma data válida."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 8. VALIDAÇÕES DE CONTEÚDO
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | ALPHA
    |--------------------------------------------------------------------------
    |
    | Permite apenas letras e espaços.
    |
    | Exemplo:
    |
    | $validator->alpha(
    |     "nome",
    |     "O nome deve conter apenas letras."
    | );
    |
    | Aceita:
    |
    | Maria Silva
    |
    */

    public function alpha($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!preg_match("/^[A-Za-zÀ-ÿ ]+$/", $valor)) {
            $this->adicionarErro(
                $campo,
                $mensagem ?? "O campo $campo deve conter apenas letras."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | ALPHA NUMERIC
    |--------------------------------------------------------------------------
    |
    | Permite letras, números e espaços.
    |
    | Exemplo:
    |
    | $validator->alphaNumeric(
    |     "codigo",
    |     "O código deve conter apenas letras e números."
    | );
    |
    | Aceita:
    |
    | PRODUTO 123
    |
    */

    public function alphaNumeric($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!preg_match("/^[A-Za-zÀ-ÿ0-9 ]+$/", $valor)) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve conter apenas letras e números."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | IN
    |--------------------------------------------------------------------------
    |
    | Verifica se o valor informado pertence
    | a uma lista de valores permitidos.
    |
    | Exemplo:
    |
    | $validator->in(
    |     "categoria",
    |     ["Roupa", "Alimento", "Eletrônico"],
    |     "Informe uma categoria válida."
    | );
    |
    */

    public function in($campo, $opcoes, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        if (!in_array($valor, $opcoes)) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O valor informado no campo $campo não é permitido."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | BOOLEAN
    |--------------------------------------------------------------------------
    |
    | Verifica se o valor representa verdadeiro ou falso.
    |
    | Valores aceitos:
    |
    | true
    | false
    | 1
    | 0
    | "1"
    | "0"
    |
    | Exemplo:
    |
    | $validator->boolean(
    |     "ativo",
    |     "Informe se o cadastro está ativo."
    | );
    |
    */

    public function boolean($campo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        $valor = $this->valor($campo);

        $valoresPermitidos = [
            true,
            false,
            1,
            0,
            "1",
            "0"
        ];

        if (!in_array($valor, $valoresPermitidos, true)) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve possuir um valor verdadeiro ou falso."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 9. VALIDAÇÕES ENTRE CAMPOS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | CONFIRMED
    |--------------------------------------------------------------------------
    |
    | Compara um campo com seu campo de confirmação.
    |
    | Por padrão:
    |
    | senha
    | senha_confirmation
    |
    | Exemplo:
    |
    | $validator->confirmed(
    |     "senha",
    |     null,
    |     "A confirmação da senha não confere."
    | );
    |
    */

    public function confirmed(
        $campo,
        $campoConfirmacao = null,
        $mensagem = null
    ) {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        // Caso não seja informado,
        // cria o campo de confirmação automaticamente
        if ($campoConfirmacao === null) {
            $campoConfirmacao = $campo . "_confirmation";
        }

        if ($this->valor($campo) !== $this->valor($campoConfirmacao)) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "A confirmação do campo $campo não confere."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | SAME
    |--------------------------------------------------------------------------
    |
    | Verifica se dois campos possuem o mesmo valor.
    |
    | Exemplo:
    |
    | $validator->same(
    |     "email",
    |     "confirmarEmail",
    |     "Os e-mails devem ser iguais."
    | );
    |
    */

    public function same($campo, $outroCampo, $mensagem = null)
    {
        if ($this->ignorarSeVazio($campo)) {
            return $this;
        }

        if ($this->valor($campo) !== $this->valor($outroCampo)) {
            $this->adicionarErro(
                $campo,
                $mensagem
                    ?? "O campo $campo deve ser igual ao campo $outroCampo."
            );
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | 10. RESULTADO DA VALIDAÇÃO
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | FAILS
    |--------------------------------------------------------------------------
    |
    | Retorna true quando existe pelo menos um erro.
    |
    | Exemplo:
    |
    | if ($validator->fails()) {
    |     echo "Existem erros.";
    | }
    |
    */

    public function fails()
    {
        return !empty($this->erros);
    }


    /*
    |--------------------------------------------------------------------------
    | PASSES
    |--------------------------------------------------------------------------
    |
    | Retorna true quando não existem erros.
    |
    | Exemplo:
    |
    | if ($validator->passes()) {
    |     echo "Dados válidos.";
    | }
    |
    */

    public function passes()
    {
        return empty($this->erros);
    }


    /*
    |--------------------------------------------------------------------------
    | ERRORS
    |--------------------------------------------------------------------------
    |
    | Retorna todos os erros encontrados.
    |
    | Exemplo:
    |
    | $erros = $validator->errors();
    |
    */

    public function errors()
    {
        return $this->erros;
    }


    /*
    |--------------------------------------------------------------------------
    | FIRST
    |--------------------------------------------------------------------------
    |
    | Retorna os erros armazenados para um campo específico.
    |
    | Exemplo:
    |
    | $erroNome = $validator->first("nome");
    |
    */

    public function first($campo)
    {
        return $this->erros[$campo] ?? null;
    }


    /*
    |--------------------------------------------------------------------------
    | DATA
    |--------------------------------------------------------------------------
    |
    | Retorna os dados recebidos pelo Validator.
    |
    | Exemplo:
    |
    | $dados = $validator->data();
    |
    */

    public function data()
    {
        return $this->dados;
    }
}