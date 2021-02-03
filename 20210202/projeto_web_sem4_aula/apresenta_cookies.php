<?php
        $conteudo = "<table id=\"tabela_cookies\" border='1px solid black' style='text-align: center'>";
        $conteudo .= "<tr>
                       <th>Nome Cookie</th>
                       <th>Valor Cookie</th>
                       <th>Deletar Cookie</th>
                       </tr>";
        foreach($_COOKIE as $name => $value) {
                $conteudo .= "<tr id='$name'>
                            <td>$name</td>
                            <td>$value</td>
                            <td><input name='cookie' type='checkbox' value='$name'></td>
                          </tr>";
        } 
        $conteudo .=  "</table> <br>";
        echo $conteudo;
?>
