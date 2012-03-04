$(function(){

	var events = new EventCollection();
	var eventsCollectionView = new EventCollectionView({ collection : events });
	events.id = '14478923';
	events.fetch({
		//id: '14478923',
		success : function (collection)
		{
			eventsCollectionView.render();
		}
	});



});
