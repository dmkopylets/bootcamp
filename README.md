# My example Laravel Development. Bootcamp Technical Task – Back-End PHP

Formulation of the task:

Develop an API that will allow creating, managing and retrieving
fee information with additional functionality.

Requirements:
Database:
○ Create a database for meetings with the following tables:
    ■ collections: Collections that users create.
        id: Unique identifier.
        title: Title of the meeting.
        description: Description of the fees.
        target_amount: Final collection amount.
        link: Link to the meeting.
        created_at: Creation date.
    ■ contributors: User contributions to the meeting.
        id: Unique identifier.
        collection_id: Foreign key to the collections table.
        user_name: The name of the user who made the contribution.
        amount: Contribution amount.

○ Creating a collection:
    ● Implement the ability to create new assemblies using
    POST request with title, description, final amount and
    link
○ Obtaining a list of collections:
    ● Implement the possibility of obtaining a list of all fees using
    GET request.
    ● Each collection must contain an identifier, title, description, end
    amount and reference.
○ Adding contributions:
    Implement the possibility of joining the collection of contributions with the help of
    POST request with username and amount.
○ Getting collection details:
    ● Implement the possibility of obtaining details of a specific fee for
    by its identifier using a GET request.
    ● Details must include a title, description, final amount, link, and
    a list of contributions with usernames and amounts.
○ Filtering fees:
    ● Implement the possibility of filtering fees by the amount left
    until the final amount is reached.
    ● Get a list of fees that have a contribution amount less than the target
    amount
Additional features (optional):
○ Implement the ability to edit and delete fees and
contributions
○ Add authorization via tokens for API access.


********************************************************
**to build the test task program, use commands:**
make dc-build
make bash
composer update
exit 

**to start the test task program, use:**

make dc-up

**it will be possible to test the application in a browser at localhost**

    http://localhost/api/documentation - Swagger API documentation
    ![demo-113838.png](Addons%2Fdemo-api-documentation.png)

    http://localhost/api/v1/collections (... /contributors) - API responses
    ![demo-113838.png](Addons%2Fdemo-api.png)

********************************************************
**You will see a frontend built using Laravel blades:**
    http://localhost
    ![demo-frontend.png](Addons%2Fdemo-frontend.png)
