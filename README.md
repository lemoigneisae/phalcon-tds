# TD phalcon I.U.T
[![N|Solid](http://slamwiki.kobject.net/_media/slam4/php/phalcon/phalcon.png?w=300&tok=554ce6)](https://phalconphp.com/fr/)

## TD0 : user-management : No framework

#### Fonctionnalités :

- Filtrer les élements:
```sh
    public function indexAction($Page = 1, $sField = "firstname", $sens = "asc", $filter = NULL)
    {
        if (isset($_GET['filtre']))
            header('location: http://localhost:8888/phalcon-tds/user-management/users/index/1/lastname/asc/' . $_GET['filtre']);
        $debut = 10 * $Page - 9;
        $users = User::find();
        $countRows = count($users);

        $this->nbPages = $countRows / ($this->lignesMax);
        $this->view->setVar("nbPages", ceil($this->nbPages));
        $this->view->setVar("Page", $Page);

        if ($filter != null) {
            $users = User::query()
                ->where("firstname like '%$filter%'")
                ->orWhere("lastname like '%$filter%'")
                ->orWhere("email like '%$filter%'")
                ->orWhere("login like '%$filter%'")
                ->orWhere("idrole like '%$filter%'")
                ->orderBy($sField . " " . $sens)
                ->execute();
        }
        else {
            $users = User::query()
                ->orderBy($sField . " " . $sens)
                ->limit(10, $debut)
                ->execute();
        }

        $this->view->setVar("curTab", $sField);
        $this->view->setVar("curSens", $sens);
        $this->view->setVar("users", $users);
        $this->view->setVar("Colonnes", ["Prénom", "Nom", "Login", "Email", "Rôle"]);
        $this->view->setVar("href", "http://localhost:8888/phalcon-tds/user-management/users/index/1");
    }
```

- Ajouter un élement :
```sh
    public function addAction()
    {
        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user = new User();
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);

            if ($user->save() == false) {
                $msg = "Ajout impossible \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("Msg", $msg);
            }
            else {
                $this->view->setVar("Msg", "Ajout effectué");
            }

            $this->dispatcher->forward(["controller"=>"users","action"=>"index"]);
        }
        $this->view->setVar("roles", Role::find());
    }
```

- Supprimer un élement : 
```sh
    public function deleteAction($id)
    {
        $user = User::findFirst($id);
        if ($user->delete() == false) {
            $msg = "Suppression impossible \n";
            foreach ($user->getMessages() as $message) {
                $msg .= $message . "\n";
            }
            $this->view->setVar("Msg", $msg);
        }
        else {
            $this->view->setVar("Msg", "Suppression effectué");
        }
    }
```

- Mettre à jour les élements : 
```sh
    public function updateAction($id)
    {
        $this->view->setVar("roles", Role::find());

        $user = User::findFirst($id);
        $this->view->setVar("update", $user);

        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);

            if ($user->save() == false) {
                $msg = "Modification impossible \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("Msg", $msg);
            }
            else {
                $this->view->setVar("Msg", "Modification effectué");
            }

            $this->dispatcher->forward(["controller"=>"users","action"=>"index"]);
        }
    }
```

- Afficher les élements : 
```sh
    public function showAction($id)
    {
        $user = User::findFirst($id);
        $this->view->setVar("show", $user);
    }
    
    <div class="ui container">
            {{ content() }}
    </div>
```

## TD1/2 : Phalcon frameword

#### Fonctionnalités :
