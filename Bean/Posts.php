<?php

namespace Bean;

/**
 * @Entity
 * @Table(name="Posts")
 */
class Posts {
    /**
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(type="integer", name="id")
     */
    private $id;
    
    /**
     * @Column(type="string", name="title")
     */    
    private $titulo;
    
    /**
     * @Column(type="text", name="description")
     */
    private $descricao;
    
    /**
     * @Column(type="datetime", name="postdate")
     */
    private $datapostagem;

    /**
     * @OneToMany(targetEntity="Comentarios", mappedBy="post", cascade={"all"}, fetch="LAZY")
     */
    private $comentarios;
    
    function __construct() {
        $this->comentarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDatapostagem() {
        return $this->datapostagem;
    }

    public function getComentarios() {
        return $this->comentarios;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDatapostagem($datapostagem) {
        $this->datapostagem = $datapostagem;
    }

    public function setComentarios(Comentarios $comentarios) {
        $comentarios->setPost($this);
        $this->comentarios->add($comentarios);
    }
}
