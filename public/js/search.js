const search = document.querySelector('input[placeholder="Search"]');
const bookContainer = document.querySelector(".books");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (books) {
            bookContainer.innerHTML = "";
            loadBooks(books)
        });
    }
});

function loadBooks(books){
    books.forEach(book => {
        console.log(book);
        createBook(book);
    });

}

function createBook(book) {
    const template = document.querySelector("#book-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = "Eragon";
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${book.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = book.title;
    const description = clone.querySelector("p");
    description.innerHTML = book.description;
    const rating = clone.querySelector(".fa-heart");
    rating.innerText = book.rating;


    bookContainer.appendChild(clone);
}