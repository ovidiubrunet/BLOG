<?php
namespace GDdesign\UserBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="UserFOS")
 * @ORM\Entity(repositoryClass="GDdesign\UserBundle\Entity\UserRepository") 
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;
    
     /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=5)
     */
    protected $locale;
    
    
    /**
     * @var integer
     *http://localhost/BLOG/web/app_dev.php
     * @ORM\Column(name="telefon", type="bigint")
     * @Assert\NotBlank()
     */
    protected $telefon;
	
    /**
     * validate if email exists with json call
     */
    protected $bootstrapValidationEmail;
    
    /**
     * validate if username exists with json call
     */
    protected $bootstrapValidationUsername;
	
    /**
     * @Assert\True()
     */
    protected $termsAccepted;
    
    protected $confirmPassword;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->termsAccepted=true;
        $this->enabled=true;
       
        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

  
    /**
     * Set telefon
     *
     * @param integer $telefon
     * @return User
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return integer 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }
	
    public function getTermsAccepted()
	{
		return $this->termsAccepted;
	}
	public function setTermsAccepted($termsAccepted)
	{
		$this->termsAccepted = (Boolean) $termsAccepted;
	}

    /**
     * Add messages
     *
     * @param \GDdesign\UserBundle\Entity\Message $messages
     * @return User
     */
    public function addMessage(\GDdesign\UserBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \GDdesign\UserBundle\Entity\Message $messages
     */
    public function removeMessage(\GDdesign\UserBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
    
      /**
     * Get confirmPassword
     *
     * @return string 
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

  
    /**
     * Set confirmPassword
     *
     * @param string $confirmPassword
     * @return User
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword= $confirmPassword;

        return $this;
    }
    
    
    
    public function setBootstrapValidationEmail($bootstrapValidationEmail)
    {
    	$this->bootstrapValidationEmail = $bootstrapValidationEmail;
    	
    	return $this;    	
    }
    
    public function getBootstrapValidationEmail()
    {
    	return $this->bootstrapValidationEmail;
    }
    
    public function setBootstrapValidationUsername($bootstrapValidationUsername)
    {
    	$this->bootstrapValidationUsername = $bootstrapValidationUsername;
    	 
    	return $this;
    }
    
    public function getBootstrapValidationUsername()
    {
    	return $this->bootstrapValidationUsername;
    }
    
    

    /**
     * Set locale
     *
     * @param string $locale
     * @return User
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
