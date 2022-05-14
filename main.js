const places = [
	{	
		name: "The Rat and Parrot" ,
		type:  {
			title: "restuarant",
			subtype: "fast casual"
		},
		thumbnail: "TheRatAndParrot1.png",
		rating: "4.2",

		description: " A great place to eat out with friends and celebrate finishing big tests or assignments. Awesome food, and great atmosphere.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>59A New St Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 5002</td>
							</tr>
							<tr>
								<td rowspan="3">Hours:</td>
								<td>Mon-Wed & Sat: 11:00-00:00</td>
							</tr>
							<tr>
								<td>Thurs-Fri: 11:00-02:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-22:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/ratandparrotgtown/">Facebook</a></td>
							</tr>
						</table>`
	},

	{
		name: "Gino's",
		type: { 
			title: "restuarant",
			subtype: "fine dining",
		},
		rating: "3.9",

		thumbnail: "Gino's.jpg",
		description: ` If you want to impress that special person by breaking the bank. This is the place to go. `,
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>8 New St Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 7208</td>
							</tr>
							<tr>
								<td>Hours:</td>
								<td>Mon-Sun: 11:00-22:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/Ginosgrahamstown/">Facebook</a></td>
							</tr>
						</table>` 
	},

	{
		name: "Fork and Dagger",
		type: {
			title: "restuarant",
			subtype: "fine dining"
		},
		thumbnail:"ForkAndDagger.jpg",
		description: "If you want to impress that special person by breaking the bank. This is the place to go. ",
		extra: 
		`<table border="1px">
							<tr>
								<td>Address:</td>
								<td>38 Somerset Street, Opposite the Arch Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 004 0006</td>
							</tr>
							<tr>
								<td rowspan="2">Hours:</td>
								<td>Mon-Sat: 11:00-22:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-16:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/majorfrasers/">Facebook</a></td>
							</tr>
						</table>		`

	},
	{
		name: "The Red cafe",
		type: {
			title: "restuarant",
			subtype: "cafe"
		},
		rating: "4.2",

		thumbnail: "RedCafe1.jpg",
		description: "A great place to grab a quick lunch between lectures and tutorials or practicals.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>127 High Street Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 8384</td>
							</tr>
							<tr>
								<td rowspan="4">Hours:</td>
								<td>Mon-Tue: 08:30-17:00</td>
							</tr>
							<tr>
								<td>Wed-Fri: 08:30-21:00</td>
							</tr>
							<tr>
								<td>Sat: 09:00-21:00</td>
							</tr>
							<tr>
								<td>Sun: 12:00-14:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/redcafemakhanda/">Facebook</a></td>
							</tr>
						</table>`
	},
	{
		name: "Major Fraser's",
		type: {
			title: "restuarant",
			subtype: "cafe"
		},

		rating: "4.8",

		thumbnail: "MajorFrasers.jpg",
		description: " A chilled place to hang with friends and grab a coffee. A popular place to eat among families. A nice place to have a farewell meal that marks your leaving the nest.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>38 Somerset Street, Opposite the Arch Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 004 0006</td>
							</tr>
							<tr>
								<td rowspan="2">Hours:</td>
								<td>Mon-Sat: 11:00-22:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-16:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/majorfrasers/">Facebook</a></td>
							</tr>
						</table>			`

	}, {

		name: "National Arts Festival",
		type: {
			title: "attraction",
			subtype: "entertainment"
		},
		rating: "5.0",
		thumbnail:"NAF.png",
		description: "The national arts festival is an annual ceremony that... "
	}, {
		name: "Museum",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: "4.0",

		thumbnail: "museum.jpg",
		description: "This Museum is held in 7 different buildings. It is the second oldest Museum in South Africa. You can have a coffee in an old prison cell if you're into that sort of thing. "
	}, {
		name: "Botanical Gardens",
		type: {
			title: "attraction",
			subtype: "wildlife/nature"
		}, 
		rating: "4.7",

		thumbnail: "Bots1.jpg",
		description: "The Botanical Gardens, also known as bots, is embodiment of Grahamstowns fauna and flora. These tranquil gardens make for fun picnics and engaging walks. Every Saturday there is also a parkrun for those who enjoy exercising outdoors."
	}, {
		name: "The Cathedral",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: "3.7",

		thumbnail: "cathedral.png",
		description: " One of Makhanda great architecture. It is the cathedral of Saint Michael and Saint George. Founded by John Armstrong. It is also the tallest building in the area and has the tallest spire in South Africa.  "
	}, {
		name: "1820s Settlers Monument",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: "3.9",

		thumbnail: "monument.jpg", 
		description: "A building that represents the ships that the 1820s settlers came on. Every Rhodes student's journey begins and ends at the Monument with the exception of covid students."
	}

	// {
	// 	name: 
	// }

]
// TODO: add a like count for each


// declaring all elements that need to be interacted with
const searchResults = document.querySelector(".search-results");
const searchInput = document.getElementById("#")


const getAttractionResults = (attractions) => {
	// This function uses an html template that a place object uses to display infromation and 
	// then inserts it into the attractions page.

	// I'm a ware that putting html in javascript is not a good idea but this is the
	// easiest way to do it

	const placesHTML = attractions.map( place => {

		return `<div class="gutter attraction-container">
					<div class="attraction">
						<div class="attraction-thumbnail-container">
						<figure class="attraction-thumbnail">
							<img src="./Images/Attractions/${place.thumbnail}" alt="picture of ${place.name}">
						<figure/>
						</div>	
						<section class="attraction-description">
							<h3>${place.name}</h3>
							<p>${place.description} </p>

						</section>
					</div>
					
				</div>`
	})

	searchResults.innerHTML = placesHTML.join(" ")

}

const onFilterByName = (e) => {
		
	console.log(e)
	// return places.filter(place => place.name.includes(substring));

}

getAttractionResults(places);

// TODO: contemplate whether to add places.extra
// TODO: onload get attractions results
// TODO: add icons to each image