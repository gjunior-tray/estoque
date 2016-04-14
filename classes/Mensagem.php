<?php
/**
 * Classe responsável pelas mensagens flash
 *
 */
class Mensagem
{

	/**
	 * Método construtor
	 *
	 * @return void
	 */
	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
	}

	/**
	 * Armazena a mensagem flash, o tipo pode ser sucesso ou erro
	 *
	 * @param string $mensagem
	 * @param string $tipo
	 * @return void
	 */
	public function flash($mensagem, $tipo)
	{
		$_SESSION['mensagem'] = $mensagem;
		$_SESSION['tipo']     = $tipo;
	}

	/**
	 * Monta alerta com mensagem de erro ou sucesso
	 *
	 * @return string
	 */
	public function alerta()
	{
		$resultado = '';

		if (!empty($_SESSION['mensagem'])) {
			if ($_SESSION['tipo'] === 'sucesso') {
				$style = 'style="color:green"';
			} elseif ($_SESSION['tipo'] === 'erro') {
				$style = 'style="color:red"';
			} else {
				$style = '';
			}

			$resultado = '<h3 ' . $style . '>
					' . $_SESSION['mensagem'] . '
				</h3>
			';

			unset($_SESSION['mensagem']);
			unset($_SESSION['tipo']);
		}

		return $resultado;
	}
}