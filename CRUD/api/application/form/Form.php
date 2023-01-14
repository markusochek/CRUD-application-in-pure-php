<?php
class Form {
    private string $textBox;
    private string $textArea;
    private string $radioButton;
    private int $checkBox1;
    private int $checkBox2;
    private int $checkBox3;
    private string $datalist;

    /**
     * Form constructor.
     * @param object $body
     */
    public function __construct(object $body)
    {
        $this->textBox = $body->textBox;
        $this->textArea = $body->textArea;

        (isset($body->radioButton)) ? $this->radioButton = $body->radioButton : $this->radioButton = "";

        (isset($body->datalist)) ? $this->datalist = $body->datalist : $this->datalist = "";

        (isset($body->checkBox1)) ? $this->checkBox1 = 1 : $this->checkBox1 = 0;
        (isset($body->checkBox2)) ? $this->checkBox2 = 1 : $this->checkBox2 = 0;
        (isset($body->checkBox3)) ? $this->checkBox3 = 1 : $this->checkBox3 = 0;
    }

    /**
     * @return string
     */
    public function getTextBox(): string
    {
        return $this->textBox;
    }

    /**
     * @param string $textBox
     */
    public function setTextBox(string $textBox): void
    {
        $this->textBox = $textBox;
    }

    /**
     * @return string
     */
    public function getTextArea(): string
    {
        return $this->textArea;
    }

    /**
     * @param string $textArea
     */
    public function setTextArea(string $textArea): void
    {
        $this->textArea = $textArea;
    }

    /**
     * @return string
     */
    public function getRadioButton(): string
    {
        return $this->radioButton;
    }

    /**
     * @param string $radioButton
     */
    public function setRadioButton(string $radioButton): void
    {
        $this->radioButton = $radioButton;
    }

    /**
     * @return string
     */
    public function getDatalist(): string
    {
        return $this->datalist;
    }

    /**
     * @param string $datalist
     */
    public function setDatalist(string $datalist): void
    {
        $this->datalist = $datalist;
    }

    /**
     * @return int
     */
    public function getCheckBox1(): int
    {
        return $this->checkBox1;
    }

    /**
     * @param int $checkBox1
     */
    public function setCheckBox1(int $checkBox1): void
    {
        $this->checkBox1 = $checkBox1;
    }

    /**
     * @return int
     */
    public function getCheckBox2(): int
    {
        return $this->checkBox2;
    }

    /**
     * @param int $checkBox2
     */
    public function setCheckBox2(int $checkBox2): void
    {
        $this->checkBox2 = $checkBox2;
    }

    /**
     * @return int
     */
    public function getCheckBox3(): int
    {
        return $this->checkBox3;
    }

    /**
     * @param int $checkBox3
     */
    public function setCheckBox3(int $checkBox3): void
    {
        $this->checkBox3 = $checkBox3;
    }
}