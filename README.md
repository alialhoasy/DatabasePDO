# DatabasePDO

### Insert Example
```
$id = $db->Insert("Insert into `TableName`( `column1` , `column2`) values ( :column1 , :column2 )", [
    'column1' => 'column1 Value',
    'column2' => 'column2 Value', 
]);
```
### Select Example
```
$db->Fetch("Select * from TableName");
```
### Select All Example 
```
$db->FetchAll("Select * from TableName");
```
### RowCountData Example
```
$db->RowCountData("Select * from TableName");
```

### Update Example
```
$db->Update("Update TableName set `column1` = :column1 where id = :id",[
        'id' => 1,
        'column1' => 'a new column1 value'
    ]);
```
### Remove Example
```
$db->Remove("Delete from TableName where id = :id",[
        'id' => 1
    ]);
```
