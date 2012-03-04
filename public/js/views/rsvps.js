var RsvpView = Backbone.View.extend({
	el: null,
	render : function()
	{

		// just render the tweet text as the content of this element.
		//this.el = $('<li><a class="recipe-link" href="#'+this.model.get('UserContentId')+'">'+this.model.get("Title")+'</a></li>');
		member = this.model.get('member');
		photo = this.model.get('member_photo');

		if(photo != null)
		{
			this.el = '<div><img src="'+photo.thumb_link+'" /></div>';

		}
		else
		{
			this.el = '<div>'+member.name+'</div>';
		}

		//console.log(this.model.get("Title"));
		return this;
	}
});

var RsvpCollectionView = Backbone.View.extend({
	el : null,

	render : function(elem)
	{
		console.log("rendering more rsvp")
		//this.el = $('#user_recipes');

		//this.el.empty();


		if(Object.size(this.collection.models) > 0)
		{
			$picGrid = $('#picGrid');
			this.collection.each(function(rsvpModel)
			{
				var rsvpView = new RsvpView({ model : rsvpModel });
				$picGrid.append($(rsvpView.render().el));

				console.log(rsvpView.render().el);
			});
		}



	}
});