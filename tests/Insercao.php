<?php

class Insercao extends PHPUnit_Framework_TestCase {
    
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
//    public function deveInserirPost() {
//        $post = new \Bean\Posts();
//        
//        $post->setTitulo("Lalico1");
//        $post->setDescricao("LINDO1");
//        $post->setDatapostagem(new DateTime(date('Y-m-d')));
//        
//        $this->entityManager->persist($post);
//        $this->entityManager->flush();
//    }
    
    /**
     * @test
     */
//    public function deveInserirPostComComentario() {
//        $post = new \Bean\Posts();
//        
//        $post->setTitulo("Dilson5");
//        $post->setDescricao("FOFO5");
//        $post->setDatapostagem(new DateTime(date('Y-m-d')));
//        
//        $post->setComentarios(new Bean\Comentarios("Aldrea vai me da um MAC LAZARO5", "MENTIRAAAAA"));
//        
//        $this->entityManager->persist($post);
//        $this->entityManager->flush();        
//    }
    /**
     * @test
     */
    public function deveInserirComentarioDePost() {
        
        $comment = new \Bean\Comentarios("Aldrea vai me da um MAC LAZARO5", "MENTIRAAAAA");
        
        $this->entityManager->persist($comment);
        $this->entityManager->flush();        
    }

}
