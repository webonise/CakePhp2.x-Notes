# TREE BEHAVIOR #

------------------------------------------------------------------------------
## Cake php Tree behavior ##
------------------------------------------------------------------------------
    * CakePHP Tree Behavior is very useful in creating a hierarchical data.
    * Tree behavior is based on [MPTT](http://www.sitepoint.com/hierarchical-data-database-2/) logic.
    * This is useful when there is more number of sub categories.

## Basic requirement :- ##

#####Your database table needs 3 fields ######,

    -    parent      : To store the id of parent object .(default:parent_id)

    -    left         : To store the left value of current row .( default :lft)

    -    right         : To store the right value of current row(Default :rght).

##Adding your data##

## Deleting your data ##

## modifying your data ##

## Adding your data ##

## Methods of tree behavior ##

###children($id = null, $direct = false, $fields = null, $order = null, $limit = null, $page = 1, $recursive = null)####
Parameters:

    $id – The ID of the record to look up
    $direct – Set to true to return only the direct descendants(Boolean value either TRUE/FALSE)
    $fields – Single string field name or array of fields to include in the return
    $order – SQL string of ORDER BY conditions
    $limit – SQL LIMIT statement
    $page – for accessing paged results
    $recursive – Number of levels deep for recursive associated Models

    In this method there is one compulsory ($id :primary key )parameter other are optional

###childCount($id = null, $direct = false)###

 This method is used 2 parameters:

    $id - Primary key value of row.
    $direct - It is optional and used to whether or not only directed children count.

 - This method will return children associated with this $id.
 - If we set $direct =true.. it will give the direct descendants.



###generateTreeList($conditions=null, $keyPath=null, $valuePath=null, $spacer= '_', $recursive=null)###

This method contains 5 parameters described below,

Parameters:

    $conditions – Uses the same conditional options as find().(optional)
    $keyPath – Path to the field to use for the key.(optional)
    $valuePath – Path to the field to use for the label.(optional)
    $spacer – The string to use in front of each item to indicate depth.(optional)
    $recursive – The number of levels deep to fetch associated record.(optional)

*Use:* This method is used to generate tree list
        if we specify the parameters it will generate according to condition
        if we are not specifying parameter then it will generate the tree from root node i.e parent node.

###getParentNode###

    This method will return parent node if parent is not present then it will return false i.e there is no parent
     $parent = $this->Category->getParentNode(2); //<- id for fun
      // $parent contains All categories

###getPath($id = null, $fields = null, $recursive = null)###

Parameters :

    $id - Primary id of that row
    $fields - (Default : NULL) -Single string field name or array of fields to include in the return
    $recursive -(Default : NULL) - The number of levels deep to fetch associated record.(optional)

    This will return the entire path from $id to parent id.
    $parents = $this->Category->getPath(15);


