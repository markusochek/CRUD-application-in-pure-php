<?php
class FormDB
{
    private $dbConnect;

    function __construct($dbConnect)
    {
        $this->dbConnect = $dbConnect;
    }

    public function insertInto($form): bool
    {
        $query = '
        INSERT INTO forms(textBox, textArea, radioButton, checkBox1, checkBox2, checkBox3, datalist)
        VALUES (?,?,?,?,?,?,?)';

        $stmt = $this->dbConnect->prepare($query);
        $body = array_values((array)$form);

        if ($stmt->execute($body)) {
            return true;
        }
    }

    public function select()
    {
        $query = "
        SELECT *
        FROM forms";
        return $this->dbConnect->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Form $form, int $id)
    {
        $query = "UPDATE forms 
        SET textBox = '".$form->getTextBox()."',
        textArea = '".$form->getTextArea()."',
        radioButton = '".$form->getRadioButton()."',
        datalist = '".$form->getDatalist()."',
        checkBox1 = '".$form->getCheckBox1()."',
        checkBox2 = '".$form->getCheckBox2()."',
        checkBox3 = '".$form->getCheckBox3()."'
        WHERE id = '".$id."'";
        return $this->dbConnect->query($query);
    }

    public function delete(int $id): bool
    {
        $query = "
        DELETE FROM forms
        WHERE id = '".$id."'";

        $this->dbConnect->query($query)->fetch();
        return true;
    }
}
