<?php
namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct(){
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId() :string
    {
        return $this->id;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function setNome(string $nome):self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones():Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso):self
    {
        //se já existir esse curso
        if($this->cursos->contains($curso))
            return $this;

        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    /**
     * @return Curso[]
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }
}
