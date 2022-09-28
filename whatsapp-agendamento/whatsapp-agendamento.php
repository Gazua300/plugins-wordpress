<?php

/*
 * Plugin Name:       Whatsapp Agendamento
 * Plugin URI:        https://github.com/Gazua300/plugins-wordpress
 * Description:       Plugins para realizar orçamentos
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Flamarion França
 * Author URI:        https://github.com/Gazua300
 * License:           GPL v2 or later
 * License URI:       https://flamarionfranca.blogspot.com/2022/09/gnu-general-public-license-version-3-29.html
 * Update URI:        https://github.com/Gazua300/plugins-wordpress
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


function orcamento_whatsapp(){
    $name = $_POST['nome'];
    $phone = $_POST['phone'];
    $produto = $_POST['product'];
    $text_whats = 'Olá, meu nome é *'. $name .'* desejo um orçamento para '.$produto.' meu número é '.$phone;
    $msg_whats = str_replace('', '%20', $text_whats);
    $url_whatsapp = 'https://api.whatsapp.com/send?1=pt_BR&phone=5571984707037&text='.$msg_whats;
    
    ?>

    <?php if(isset($_POST['submit'])){ ?>
    <script>
        window.location = '<?php echo $url_whatsapp; ?>'
    </script>
    
    <?php } ?>
    <form method='post'>
    <input type='text' name='nome' placeholder='Nome'/>
    <input type='tel' name='phone' onkeypress='return event.charCode > 47 && event.charCode < 58'
        placeholder='Telefone'/>
        <input type="text" name="product" placeholder='Nome do produto'/>
        <input type="submit" value="Pedir orçamento" name='submit'>
        </form>
        
    <?php
    } 
    
    add_shortcode('orcamento', 'orcamento_whatsapp');    

