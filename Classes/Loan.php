<?php

class Loan
{
    private static $nextLoanId = 1;
    private $loanId;
    private $bookId;
    private $userId;
    private $loanDate;
    private $returnDate;

    public function __construct($bookId, $userId)
    {
        $this->loanId = self::$nextLoanId++;
        $this->bookId = $bookId;
        $this->userId = $userId;
        $this->loanDate = date('Y-m-d'); // Current date
        $this->returnDate = null; // Not returned yet
    }

    public function recordLoan()
    {
        // Simulate updating the book's status
        echo "Book with ID {$this->bookId} has been loaned to User with ID {$this->userId} on {$this->loanDate}.\n";

        // Additional logic: e.g., update database, notify user, etc.
    }

    public function getLoanId()
    {
        return $this->loanId;
    }

    public function getLoanDetails() {}
}
