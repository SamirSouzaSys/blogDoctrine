<?php

namespace Bean;

/**
 * @Entity
 * @Table(name="Comments")
 */
class Comentarios {
    
    /**
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(type="integer", name="id")
     */
    private $id;
    
    /**
     * @Column(type="text", name="description")
     */
    private $descricao;
    
    /**
     * @Column(type="string", name="email")
     */
    private $email;
    
    /**
     * @ManyToOne(targetEntity="Posts", inversedBy="comentarios", cascade={"all"}, fetch="LAZY")
     * @JoinColumn(name="Posts_id", referencedColumnName="id")
     */
    private $post;
    
    function __construct($descricao = NULL, $email = NULL) {
        $this->descricao = $descricao;
        $this->email = $email;
        $this->post = new Posts();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPost() {
        return $this->post;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPost(Posts $post) {
        $this->post = $post;
    }


}
