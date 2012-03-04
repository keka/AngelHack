$(function(){

	var event = new Event();
	var eventReportView = new EventReportView({ model : event });
	event.set('id', PAGE_EVENT);
	event.fetch({
		//id: '14478923',
		success : function (model)
		{
			eventReportView.render();
		}
	});


	var rsvps = new RsvpCollection();
	var rsvpCollectionView = new RsvpCollectionView({ collection : rsvps });
	rsvps.id = PAGE_EVENT;
	rsvps.fetch({
		//id: '14478923',
		success : function (collection)
		{
			rsvpCollectionView.render();
		}
	});




});