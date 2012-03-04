var EventView = Backbone.View.extend({
	el: null,
	render : function()
	{

		// just render the tweet text as the content of this element.
		//this.el = $('<li><a class="recipe-link" href="#'+this.model.get('UserContentId')+'">'+this.model.get("Title")+'</a></li>');
		this.el = '<div><a href="event/'+this.model.get('id')+'" >'+this.model.get('name')+'</a></div>';

		//console.log(this.model.get("Title"));
		return this;
	}
});

var EventCollectionView = Backbone.View.extend({
	el : null,

	render : function(elem)
	{
		console.log("rendering more events")
		//this.el = $('#user_recipes');

		//this.el.empty();


		if(Object.size(this.collection.models) > 0)
		{
			$main = $('#main');
			this.collection.each(function(eventModel)
			{
				var eventView = new EventView({ model : eventModel });
				$main.append($(eventView.render().el));

				console.log(eventView.render().el);
			});
		}



	}
});

var EventReportView = Backbone.View.extend({
	el: null,
	render : function()
	{

		// just render the tweet text as the content of this element.
		//this.el = $('<li><a class="recipe-link" href="#'+this.model.get('UserContentId')+'">'+this.model.get("Title")+'</a></li>');
		$main = $("#main");
		this.el = '<div>'+this.model.get('name')+'</div>';
		$main.append($(this.el));
		console.log(this.model.get);
		//console.log(this.model.get("Title"));
		return this;
	}
});