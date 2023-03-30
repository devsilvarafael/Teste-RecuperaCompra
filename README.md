<div align="center">
    <h2>Painel de Controle - Recupera Compra</h2>
    <p align="center">
        <p>Painel de Controle desenvolvido com Laravel e TailwindCSS</p>
    </p>
</div>

![image](https://user-images.githubusercontent.com/81942196/228699786-c26a5e9b-30b4-4407-8058-0309fe9f96d1.png)


### Instalação
Clonar e instalar

    git clone git@github.com:devsilvarafael/Teste-RecuperaCompra.git
    cd Teste-RecuperaCompra
    composer install
    e
    npm install

Iniciar ambiente de desenvolvimento

    backend: php artisan serve
    frontend: npm run dev

Env

    Em DB_DATABASE, certifique-se que não há nenhum DB com este nome, caso haja, troque o nome.
    
    DB_DATABASE=teste_recuperacompra
    DB_USERNAME=root
    DB_PASSWORD=admin
    
Rotas
    
    /login - Fazer login na aplicação, sem o login você não acessa as outras rotas.
    /painel/usuarios - Lista dos usuários cadastrados.
    /painel/categorias - Lista das categorias cadastradas.
    
    /painel/usuarios/cadastrar - Formulário de cadastro de um novo usuário, caso o e-mail já exista um erro será mostrado.
    /painel/categorias/cadastrar - Formulário de cadastro de uma nova categoria.
 
    /painel/usuarios/editar/{id} - Editar usuário buscando pelo ID.
    /painel/categorias/editar/{id} - Editar categoria buscando pelo ID.

    + rotas de busca pelo input onde é realizado uma query no banco trazendo os dados procurados.   
    
