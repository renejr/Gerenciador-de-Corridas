<?php
require_once 'vendor/autoload.php'; // Carrega as dependências do Composer, incluindo o Selenium WebDriver

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\lib\WebDriverBy;

// Configurações para inicializar o Selenium WebDriver
$host = 'http://localhost:4444/wd/hub'; // Endereço do servidor Selenium WebDriver
$capabilities = ['browserName' => 'chrome']; // Especifica o navegador a ser usado (Chrome neste caso)

// Inicializa o WebDriver com as configurações fornecidas
$driver = RemoteWebDriver::create($host, $capabilities);

// Define a URL da aplicação a ser testada
$url = 'http://localhost/Gerenciador-de-Corridas/index.php';

// Navega até a página da aplicação
$driver->get($url);

// Encontra e clica no botão "Cancelar" da primeira corrida na tabela
$cancelButton = $driver->findElement(WebDriverBy::xpath("//table/tbody/tr[1]/td[4]/button"));
$cancelButton->click();

// Espera 2 segundos para que a mensagem de confirmação seja exibida
sleep(2);

// Encontra e clica no botão "OK" da mensagem de confirmação
$confirmButton = $driver->switchTo()->alert();
$confirmButton->accept();

// Espera 2 segundos para que a corrida seja cancelada
sleep(2);

// Fecha o navegador
$driver->quit();
?>
