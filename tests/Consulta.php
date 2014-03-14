<?php


class Consulta extends PHPUnit_Framework_TestCase {
    private $entityManager;
    
    public function setUp() {
        //$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array("/var/www/html/Blog/Bean"));
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array("/media/samir_souza/PersonalDataLocal/Sync/Dropbox/Trabs/Unasus/SamProg"));
        //$config->setAutoGenerateProxyClasses(TRUE);
        //$config->setProxyDir(CAMINHO_APLICACAO_DOMINIO . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR);

        $arrayConfigConnection = array(
            'dbname' => 'Blog',
            'user' => 'root',
            'password' => 'root',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
            'charset' => 'utf8',
        );
          
        $this->entityManager = \Doctrine\ORM\EntityManager::create($arrayConfigConnection, $config);

        $this->entityManager->getConnection()->connect();
    }
    
    public function tearDown() {
        $this->entityManager = NULL;
    }
    
    /**
     * @test
     */
//    public function deveConsultarComDQL() {
//        /**
//         * SELECT * FROM Posts WHERE id = 14
//         */
//                
//        $sSql =   "SELECT Post FROM Bean\Posts Post WHERE Post.id = :ID ";
//        
//        $stmQuery = $this->entityManager->createQuery($sSql);
//        $stmQuery->setParameter("ID", "14");
//        
//        $retornoQuery = $stmQuery->getResult(); 
//                
//        $post = $retornoQuery[0];
//        $comentario = $post->getComentarios()[0];
//        
//        print_r($comentario->getDescricao());
//        
//    }
//
//    /**
//     * @test
//     */
//    public function deveConsultaComQueryNativa() {
//        
//        $sSql =   "SELECT id, title, description, postdate FROM Posts Post WHERE Post.id = :ID ";
//        
//        $resultMapping = new Doctrine\ORM\Query\ResultSetMapping();
//        $resultMapping->addEntityResult("Bean\Posts", "Post");
//        $resultMapping->addFieldResult("Post", "id", "id");
//        $resultMapping->addFieldResult("Post", "title", "titulo");
//        $resultMapping->addFieldResult("Post", "description", "descricao");
//        $resultMapping->addFieldResult("Post", "postdate", "datapostagem");
//
//        $stmQuery = $this->entityManager->createNativeQuery($sSql, $resultMapping);
//        $stmQuery->setParameter("ID", "14");
//        
//        $retornoQuery = $stmQuery->getResult();
//                
//        $post = $retornoQuery[0];
//        $comentario = $post->getComentarios()[0];
//        
//        print_r($comentario->getDescricao());
//        
//    }
//    
    public function deveConsultaComQueryNativaComentario() {
        
        //$sSql =   "SELECT id, title, description, postdate FROM Posts Post WHERE Post.id = :ID ";
        $sSql = "SELECT	
                    `Comments`.`id`, `Comments`.`Posts_id`, `Comments`.`description`,
                    Posts.`id`,	Posts.`description`, Posts.`postdate`, Posts.`title`
                FROM
                    Comments INNER JOIN Posts
                ON
                    `Comments`.`id` = :ID AND
                    Posts.`id` = `Comments`.`Posts_id`";

        $resultMapping = new Doctrine\ORM\Query\ResultSetMapping();
        //comments
        $resultMapping->addRootEntityFromClassMetadata("Bean\Comentarios", "Comments");
//        $resultMapping->addFieldResult("Comments", "id", "id");
//        $resultMapping->addMetaResult("Comments", "Posts_id", "post");
//        $resultMapping->addFieldResult("Comments", "description", "descricao");
        //post
        $resultMapping->addJoinedEntityFromClassMetadata("Bean\Posts", "Post");
//        $resultMapping->addFieldResult("Post", "id", "id");
//        $resultMapping->addFieldResult("Post", "description", "descricao");
//        $resultMapping->addFieldResult("Post", "postdate", "datapostagem");
//        $resultMapping->addFieldResult("Post", "title", "titulo");
       

        $stmQuery = $this->entityManager->createNativeQuery($sSql, $resultMapping);
        $stmQuery->setParameter("ID", '8');
        
        $retornoQuery = $stmQuery->getResult();
                
        $post = $retornoQuery[0];
        $comentario = $post->getComentarios()[0];
        
        //print_r($comentario->getDescricao());
        print_r($comentario->getDescricao());
        
    }
        
}
