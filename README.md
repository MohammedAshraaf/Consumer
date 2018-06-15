# Consumer
This is a task demonstrates some of SOLID principles.

# Explanation ...

## description
As the task requires, there is a consumer class tries to consume products. Those products can come from different sources that the consumer doesn't know or even care about.

## Single Responsibility
According to the first principle of SOLID, which is single responsibility, the consumer should only consumes the data. It gets the data from a source that is able to fetch the data for it, then it gives to another source that able to save the data. So in this case the only responsibility that the consumer has is to consume the data.
Following the same method, the source that fetches the data is also responsible only for fetching the data, and The database repo is responsible for only dealing with the database.

## Open-Closed
The consumer follows the second principle of SOLID, open closed. Although, the open part is not clear, however, the closed part can be seen as the consumer should be closed for modification. At any time we decide to change the data source to another source, the consumer won't be changed thanks to the interface. Any data source that the consumer will use is going to implement the interface, thus, the getData method which is what the consumer cares about.

## Liskov Substitution
However, the code may break the third principle of SOLID, Liskov Substitution, because the data source may return the data in different format. Meaning that source data classes can't replace each others and returns the same results. Unfortunately, php is weekly typed programming language that doesn't force you to return a specific data type from an array. The only available way is type hinting. 
<br>However, I decided to overcome this problem by creating a new interface that formats the data for you with the way it sees appropriate for saving the data! 

## Interface Segregation
In my code there weren't a place where I demonstrate the fourth principle, Interface segregation.

## Dependency Inversion 
The last principle, dependency inversion, can be shown by the Consumer only depends on interfaces. The consumer doesn't care about how they are implemented and it shouldn't have knowledge about how those sources are going to perform their action. What the Consumer cares about is that they can perform the action and that's what the interface assure to it.
<br>The Consumer now knows that the data source can get the data for it, the format interface can format the data for it, and the database repo can save the data for it. 